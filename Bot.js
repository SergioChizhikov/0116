// ==UserScript==
// @name         Bot for Zapmeta
// @namespace    http://tampermonkey.net/
// @version      0.2
// @description  users bot
// @author       Chizhikov Sergey
// @match        https://www.zapmeta.com/*
// @match        https://napli.ru/*
// @grant        none
// ==/UserScript==

(function() {
  'use strict';
  let input = document.getElementsByName("q")[0];
  let searchBtn = document.getElementsByClassName("search-header__field-button")[0];
  let menu = document.getElementsByClassName("search-header__button-menu")[0];
  let mainLogo = document.querySelector(".jumbotron__logo");
  let links = document.links;
  let keywords = ["10 самых популярных шрифтов от Google", "Отключение редакций и ревизий в WordPress",
                  "Vite — классный и новый продукт","Вывод произвольных типов записей и полей"];
  let keyword = keywords[getRandom(0, keywords.length)];
  //let keyword = "Git для всех платформ";


  //Работаем на главной странице поисковика
  if (mainLogo !== null) {
    let i = 0;
    let timerId = setInterval(() => {
      input.value += keyword[i];
      i++;
      if (i == keyword.length) {
        clearInterval(timerId);
        searchBtn.removeAttribute("disabled");
        searchBtn.click();
      }
    }, 300)
    //Работаем на целевом сайте
    } else if (location.hostname == "napli.ru") {

      setInterval(() => {
        let index = getRandom(0, links.length);
        let link = links[index];
        
        if (getRandom(0, 101) >= 80) {
          location.href = "https://www.zapmeta.com";
        }
        
        if (link.href.includes("napli.ru")) {
          link.click();
        }
      }, getRandom(2000, 3500))

      console.log("Мы на целевом сайте");
    } 
  //Работаем на странице поисковой выдачи
  else {
    let nextPage = true;
    for (let i = 0; i < links.length; i++) {
      if (links[i].href.includes("napli.ru")) {
        let link = links[i];
        nextPage = false;
        console.log("Нашел строку " + link);
        setTimeout(() => {
          link.click();
        }, getRandom(2500, 4000))
      }
    }
    if (document.querySelector(".pagination__item--active").innerText == "4") {
      nextPage = false;
      location.href = "https://www.zapmeta.com";
    }
    if(nextPage) {
      setTimeout(() => {
        document.querySelectorAll(".pagination__link--chevron")[1].click();
      }, getRandom(4000, 4500))

    }
  }

  function getRandom(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
  }
})();
