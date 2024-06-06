<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Личный кабинет пользователя</title>
  <style>
    body {
      font-size: 1.5rem;
      background-color: beige;
    }

    input {
      font-size: 1.5rem;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
    }

    .section {
      margin: auto;
      padding: 3rem;
      max-width: 1200px;
      color: orangered;
    }

    h1 {
      text-align: center;
      margin-top: 2rem;
      margin-bottom: 2rem;
    }

    p>span:nth-child(1) {
      color: darkolivegreen;
      margin-left: 1rem;
    }

    p>span:nth-child(2) {
      color: green;
      margin-left: 1rem;
      padding-left: 1rem;
      padding-right: 1rem;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      background-color: lightgreen;
      border: 1px solid green;
      border-radius: 6px;
      cursor: pointer;
    }

    p>span:nth-child(2):hover {
      color: white;
      background-color: green;
    }

    p>span:nth-child(3) {
      color: red;
      margin-left: 1rem;
      padding-left: 1rem;
      padding-right: 1rem;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      background-color: lightcoral;
      border: 1px solid red;
      border-radius: 6px;
      cursor: pointer;
    }

    p>span:nth-child(3):hover {
      color: white;
      background-color: red;
    }

    p>span:nth-child(4) {
      color: blue;
      margin-left: 1rem;
      padding-left: 1rem;
      padding-right: 1rem;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      background-color: lightblue;
      border: 1px solid blue;
      border-radius: 6px;
      cursor: pointer;

    }

    p>span:nth-child(4):hover {
      color: white;
      background-color: blue;
    }

    .exit-btn {
      display: block;
      max-width: fit-content;
      margin-top: 8rem;
      text-decoration: none;
      text-align: center;
      color: orangered;
      margin-left: 1rem;
      padding-left: 1rem;
      padding-right: 1rem;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      background-color: lightblue;
      border: 1px solid orangered;
      border-radius: 6px;
      cursor: pointer;
    }

    .exit-btn:hover {
      color: white;
      background-color: orangered;
    }
  </style>
</head>

<body>
  <section class="section">
    <h1>Личный кабинет</h1>

    <p>Id:
      <span> <?php echo $_SESSION["id"]; ?></span>
    </p>
    <p>Email:
      <span> <?php echo $_SESSION["email"]; ?></span>
    </p>
    <p>Имя пользователя:
      <span> <?php echo $_SESSION["name"]; ?></span>
      <span class="edit-btn"> Изменить </span>
      <span class="save-btn" hidden data-item="name"> Сохранить </span>
      <span class="cancel-btn" hidden> Отменить </span>
    </p>
    <p>Фамилия пользователя:
      <span> <?php echo $_SESSION["lastname"]; ?></span>
      <span class="edit-btn"> Изменить </span>
      <span class="save-btn" hidden data-item="lastname"> Сохранить </span>
      <span class="cancel-btn" hidden> Отменить </span>
    </p>
    <a class="exit-btn" href="php/exit_obr.php"> Выход </a>
  </section>

  <script>
    let edit_buttons = document.querySelectorAll(".edit-btn");
    let save_buttons = document.querySelectorAll(".save-btn");
    let cancel_buttons = document.querySelectorAll(".cancel-btn");

    for (let i = 0; i < edit_buttons.length; i++) {
      let inputValue = edit_buttons[i].previousElementSibling.innerText;

      edit_buttons[i].addEventListener("click", () => {
        edit_buttons[i].previousElementSibling.innerHTML = `<input type="text" value="${inputValue}">`;
        edit_buttons[i].hidden = true;
        save_buttons[i].hidden = false;
        cancel_buttons[i].hidden = false;
      })

      cancel_buttons[i].addEventListener("click", () => {
        edit_buttons[i].previousElementSibling.innerText = inputValue;
        edit_buttons[i].hidden = false;
        save_buttons[i].hidden = true;
        cancel_buttons[i].hidden = true;
      })

      save_buttons[i].addEventListener("click", async () => {
        let newInputValue = edit_buttons[i].previousElementSibling.firstElementChild.value;
        edit_buttons[i].previousElementSibling.innerText = newInputValue;

        edit_buttons[i].hidden = false;
        save_buttons[i].hidden = true;
        cancel_buttons[i].hidden = true;

        let formData = new FormData();
        formData.append("value", newInputValue);
        let item = save_buttons[i].dataset.item;
        formData.append("item", item);

        let response = await fetch("php/lk_obr.php", {
          method: "POST",
          body: formData
        });
      })


    }
  </script>
</body>

</html>
