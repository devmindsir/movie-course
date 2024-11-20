let HamburgerMenu = document.querySelector(".HamburgerMenu");
let Menu = document.querySelector(".hamburger");

let darkPage = document.querySelector(".hamburger__dark");

let contentPage = document.querySelector(".hamburger__content");

let closeMenu = document.querySelector(".hamburger__Close-Icon");

let subMenu = document.querySelector(".hamburger__SubMenu-List");
HamburgerMenu.addEventListener("click", showMenu);
closeMenu.addEventListener("click", hideMenu);
darkPage.addEventListener("click", hideMenu);

subMenuFlag = false;
function showSubMenu(e) {
  let parentElem = e.children[1];
  if (subMenuFlag === false) {
    parentElem.style.display = "block";
    subMenuFlag = true;
  } else {
    parentElem.style.display = "none";
    subMenuFlag = false;
  }
}

function hideMenu() {
  darkPage.style.display = "none";
  Menu.style.display="none";

  contentPage.style.right = "-70rem";
  document.body.style.overflow = "auto";
}

function showMenu() {
  
  darkPage.style.display = "block";
  Menu.style.display="block";
  contentPage.style.right = "0px";
  document.body.style.overflow = "hidden";
}
