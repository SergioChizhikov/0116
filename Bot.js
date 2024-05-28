// ==UserScript==
// @name         Bot for Zapmeta
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  users bot
// @author       Chizhikov Sergey
// @match        https://www.zapmeta.com/*
// @grant        none
// ==/UserScript==

(function() {
  'use strict';
  let input = document.getElementsByName("q")[0];
  let searchBtn = document.getElementsByClassName("search-header__field-button")[0];
  let menu = document.getElementsByClassName("search-header__button-menu")[0];
  let links = document.links;
  let keywords = ["10 самых популярных шрифтов от Google", "Отключение редакций и ревизий в WordPress", "Vite — классный и новый продукт"];
  let keyword = keywords[getRandom(0, keywords.length)];

  if (menu === undefined) {
    input.value = keyword;
    searchBtn.removeAttribute("disabled");
    searchBtn.click();
  } else {
    for (let i = 0; i < links.length; i++) {
      if (links[i].href.includes("napli.ru")) {
        let link = links[i];
        console.log("Нашел строку " + link);
        link.click();
      }
    }
  }
  function getRandom(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
  }


})();
