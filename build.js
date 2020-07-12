const { execSync } = require("child_process");
const fs = require("fs");
const path = require("path");
const glob = require("glob");
const rimraf = require("rimraf");

const rootDir = process.cwd();

function replaceAll(str, patterns) {
  return patterns.reduce((prev, cur) => {
    const { from, to } = cur;
    const regex = new RegExp(from, "g");
    const res = prev.replace(regex, to);
    console.log(res);
    return res;
  }, str);
}

function copyDir(from, to) {
  execSync(`cp -rf ${from} ${to}/${from}`);
}

function createDir(dir) {
  if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
  }
}

function copyAssets() {
  copyDir("css", ".out");
  copyDir("js", ".out");
  copyDir("images", ".out");
}

function buildHTML() {
  const phpFiles = glob.sync("**/*.php", { ignore: "node_modules" });
  const phpFilesWithDirInformation = phpFiles.map((file) => ({
    dir: path.dirname(file),
    file: file,
  }));

  phpFilesWithDirInformation.forEach(({ dir, file }) => {
    const htmlFile = file.replace(".php", ".html");
    const stdout = execSync(`cd ${rootDir}/${dir}; php -f ${rootDir}/${file}`);
    createDir(`${rootDir}/.out/${dir}`, { recursive: true });
    fs.writeFileSync(`${rootDir}/.out/${htmlFile}`, stdout);
  });

  // find and replace references to images css and js
  // const htmlFiles = glob.sync(".out/**/*.html");
  // htmlFiles.slice(14, 15).forEach((file) => {
  //   const str = fs.readFileSync(file).toString();
  //   const modified = replaceAll(str, [
  //     { from: `"css`, to: `"./css` },
  //     { from: `"js`, to: `"./js` },
  //     { from: `"images`, to: `"./images` },
  //     { from: `"/css`, to: `"./css` },
  //     { from: `"/js`, to: `"./js` },
  //     { from: `"/images`, to: `"./images` },
  //     { from: `/images`, to: `"./images` },
  //   ]);
  //   fs.writeFileSync(file, Buffer.from(modified));
  // });
}

rimraf.sync(".out");
createDir(".out");
buildHTML();
copyAssets();
