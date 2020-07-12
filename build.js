const { execSync } = require("child_process");
const fs = require("fs");
const path = require("path");
const glob = require("glob");
const rimraf = require("rimraf");
const sass = require("sass");
const jsdom = require("jsdom");

const rootDir = process.cwd();

function modifyAllSassLinks(document) {
  const stylesheets = document.querySelectorAll("link[rel=stylesheet]");
  stylesheets.forEach(
    (node) => (node.href = node.href.replace(/\.scss$/, ".css"))
  );
}

function modifyAllJsImports(document) {
  const scripts = document.querySelectorAll("script");
  scripts.forEach((e) => {
    if (!/^http.*/g.test(e.src)) {
      e.src = e.src.replace("/js", "./js");
    }
  });
}

function modifyAllAnchors(document) {
  const anchors = document.querySelectorAll("a");
  anchors.forEach((e) => {
    if (!/^http.*/g.test(e.src)) {
      e.href = e.href.substr(1);
      e.href = e.href + "/index.html";
    }
  });
}

function replaceAll(str, patterns) {
  return patterns.reduce((prev, cur) => {
    const { from, to } = cur;
    const regex = new RegExp(from, "g");
    const res = prev.replace(regex, to);
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

  const htmlFiles = glob.sync(".out/**/*.html");
  htmlFiles.forEach((file) => {
    const str = fs.readFileSync(file).toString();
    const {
      window: { document },
    } = new jsdom.JSDOM(str);
    modifyAllSassLinks(document);
    modifyAllJsImports(document);
    modifyAllAnchors(document);
    fs.writeFileSync(file, document.documentElement.innerHTML);
  });
}

function compileCss() {
  createDir(`${rootDir}/.out/css`);
  const sassFiles = glob.sync("css/*.scss", { ignore: ".sass-cache" });
  sassFiles.forEach((file) => {
    const dir = path.dirname(file);
    const fileName = file.replace(dir, "");
    const { css } = sass.renderSync({ file });
    const cssFileName = fileName.replace(".scss", ".css");
    fs.writeFileSync(`${rootDir}/.out/css/${cssFileName}`, css);
  });
}

rimraf.sync(".out");
createDir(".out");
buildHTML();
compileCss();
copyAssets();
