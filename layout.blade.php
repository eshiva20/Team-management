<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <title>@yield('page_title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=20240711">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=20240711">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=20240711">
    <link rel="manifest" href="/site.webmanifest?v=20240711">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=20240711" color="#a00a37">
    <link rel="shortcut icon" href="/favicon.ico?v=20240711">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
      rel="stylesheet"
    />
    <meta name="apple-mobile-web-app-title" content="Wednesday CRM for HBL">
    <meta name="application-name" content="Wednesday CRM for HBL">
    <meta name="msapplication-TileColor" content="#a00a37">
    <meta name="theme-color" content="#ffffff">


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V4K0S72LKM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-V4K0S72LKM', {
            'user_id': '<?php echo auth()->guard('user')->user()->name; ?>'
        });
    </script>

    <style>
        p,
h1,
h2,
h3,
h4,
h5,
h6 {
  margin: 0px;
  padding: 0px;
}

body {
  margin: 0;
  background-color: #edf5ef;
  display: flex;
  align-items: center;
  font-family: "Rubik", sans-serif;
}

.sidebar {
  width: 9%;
  background: #171b21;
  color: #009b1c;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;

  .top {
    display: flex;
    flex-direction: column;
    align-items: center;
    .task_icon {
      padding-top: 20px;
      width: 40px;
    }
    .task_master {
      padding-top: 10px;
      color: #fff;
    }
    .add_icon {
      box-shadow: 2px -2px 5px 0px #003e0be5 inset,
        -2px 2px 4px 0px #00f82de5 inset, 2px 2px 4px 0px #003e0b33 inset,
        -2px -2px 4px 0px #003e0b33 inset, -1px 1px 2px 0px #003e0b80,
        1px -1px 2px 0px #00f82d4d;
      outline: none;
      border: none;
      background: #009b1c;
      font-size: 32px;
      padding: 4px 12px;
      margin-top: 15px;
      cursor: pointer;
      color: #fff;
      border-radius: 5px;
    }
  }
  .all_side_menus {
    width: 100%;
    margin-top: 40px;
    display: flex;
    align-items: center;
    gap: 5px;
    flex-direction: column;
    .single_side_menu:nth-child(2) {
      background: #009b1c;
      color: #fff;
    }
    .single_side_menu {
      cursor: pointer;
      box-shadow: -1px 1px 3px 0px #090b0de5, -1px -1px 2px 0px #090b0d33,
        1px -1px 2px 0px #090b0d inset, -1px 1px 2px 0px #252b35 inset;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px 0px;
      width: 100%;
      .single_side_menu_icon {
        width: 20px;
        height: 20px;
        object-fit: contain;
      }
      .single_side_menu_name {
        margin-top: 5px;
        font-weight: 600;
      }
    }
  }
}

.main {
  width: 91%;
  height: 100vh;

  .topbar {
    border-bottom: 1px solid #d8d8d8;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    .search_div {
      background: #edf5ef;
      border-radius: 7px;
      border: 1px solid #20313a33;
      width: fit-content;
      padding: 5px 8px;
      display: flex;
      align-items: center;
      gap: 7px;
      color: #20313a;
      box-shadow: 2px 2px 5px 0px #d1d8d2e5 inset,
        -2px -2px 4px 0px #ffffffe5 inset, 2px -2px 4px 0px #d1d8d233 inset,
        -2px 2px 4px 0px #d1d8d233 inset, -1px -1px 2px 0px #d1d8d280,
        1px 1px 2px 0px #ffffff4d;
      .input {
        background: transparent;
        outline: none;
        border: none;
        font-size: 16px;
      }
    }
    .topbar_right {
      display: flex;
      align-items: center;
      margin-left: auto;
      gap: 15px;
      .bell {
        width: 20px;
        border: 0.5px solid #009b1c;
        padding: 10px 12px;
        border-radius: 10px;
        box-shadow: 11px 11px 28px 0px #dfe5e1e5, -11px -11px 22px 0px #fbfffde5,
          11px -11px 22px 0px #dfe5e133, -11px 11px 22px 0px #dfe5e133,
          -1px -1px 2px 0px #dfe5e180 inset, 1px 1px 2px 0px #fbfffd4d inset;
        display: flex;
        align-items: center;
        justify-content: center;

        .bell_icon {
          font-size: 20px;
        }
      }
      .user_info {
        display: flex;
        align-items: center;
        gap: 10px;
        border: 0.5px solid #009b1c;
        padding: 5px 10px;
        border-radius: 7px;
        width: 180px;
        height: 32px;

        .user_logo {
          width: 35px;
        }
        .texts {
          .name {
            color: #303030;
            font-weight: 600;
            font-size: 14px;
          }
          .role {
            color: #000;
            font-weight: 300;
            font-size: 12px;
          }
        }
        .down_arrow {
          margin-left: auto;
          cursor: pointer;
        }
      }
    }
  }}
    </style>

    @yield('head')
    @stack('css')
</head>

<body style="scroll-behavior: smooth;">

    <!-- Enable if you want to put top nav bar and side bar in different files -->
    <!-- @ include ('admin::shiva.nav-top') -->
    <!-- @include ('admin::shiva.nav-left') -->

    <section class="sidebar">
      <div class="top">
        <img src="./assets/task_icon.png" alt="Task_icon" class="task_icon" />
        <p class="task_master">Task Master</p>
        <button class="add_icon">+</button>
      </div>
      <div class="all_side_menus"></div>
    </section>


    <div class="main">
      <div class="topbar">
        <div class="search_div">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input class="input" type="text" placeholder="Search" />
        </div>
        <div class="topbar_right">
          <div class="bell">
            <i class="fa-regular fa-bell bell_icon"></i>
          </div>
          <div class="user_info">
            <img src="./assets/user.png" alt="user" class="user_logo" />
            <div class="texts">
              <p class="name">Hi Aakash</p>
              <p class="role">Sales Person</p>
            </div>
            <i class="fa-solid fa-chevron-down down_arrow"></i>
          </div>
        </div>
      </div>
        @yield('content-wrapper')
    </div>

    <script>
    const sidebarIcons = [
    {
      icon: "./assets/dashboard.png",
      name: "Dashboard",
    },
    {
      icon: "./assets/meeting.png",
      name: "Meeting",
    },
    {
      icon: "./assets/task.png",
      name: "My Task",
    },
    {
      icon: "./assets/calendar.png",
      name: "Calenders",
    },
  ];

  const allSideMenus = document.querySelector(".all_side_menus");
  sidebarIcons.forEach((item) => {
    const single_side_menu = document.createElement("div");
    single_side_menu.classList.add("single_side_menu");

    const img = document.createElement("img");
    img.classList.add("single_side_menu_icon");
    img.src = item.icon;
    img.alt = item.name;

    const name = document.createElement("span");
    name.classList.add("single_side_menu_name");
    name.textContent = item.name;

    single_side_menu.appendChild(img);
    single_side_menu.appendChild(name);

    allSideMenus.appendChild(single_side_menu);
  });
    </script>

    @stack('scripts')
</body>

</html>