document.addEventListener("DOMContentLoaded", function () {
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
});
