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

  const meetingsData = [
    {
      frequency: "3x Weekly",
      dates: [
        {
          date: "14 Aug, 2024",
          day: "Wed",
          time: "8:00 AM - 8:30 AM",
          agenda: "Funding",
          button: "View MOM",
        },
        {
          date: "15 Aug, 2024",
          day: "Thu",
          time: "8:00 AM - 8:30 AM",
          agenda: "Fund Allocation",
          button: "Update",
        },
        {
          date: "16 Aug, 2024",
          day: "Fri",
          time: "8:00 AM - 8:30 AM",
          agenda: "Miscellaneous",
          button: "View MOM",
        },
      ],
      department: "Finance",
      meetingType: "Recurring",
      meetingID: "112244",
      leader: { name: "M.D Sir", image: "./assets/leader.png" },
    },
    {
      frequency: "3x Weekly",
      dates: [
        {
          date: "14 Aug, 2024",
          day: "Wed",
          time: "8:00 AM - 8:30 AM",
          agenda: "Funding",
          button: "View MOM",
        },
        {
          date: "15 Aug, 2024",
          day: "Thu",
          time: "8:00 AM - 8:30 AM",
          agenda: "Fund Allocation",
          button: "Update",
        },
        {
          date: "16 Aug, 2024",
          day: "Fri",
          time: "8:00 AM - 8:30 AM",
          agenda: "Miscellaneous",
          button: "View MOM",
        },
      ],
      department: "Finance",
      meetingType: "Recurring",
      meetingID: "112244",
      leader: { name: "M.D Sir", image: "./assets/leader.png" },
    },
  ];

  const allSideMenus = document.querySelector(".all_side_menus");
  const container = document.querySelector(".container");

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

  meetingsData.forEach((meeting) => {
    const meetingBlock = document.createElement("div");
    meetingBlock.classList.add("meeting-block");

    const frequencyDiv = document.createElement("div");
    frequencyDiv.classList.add("meeting_frequency");
    frequencyDiv.innerHTML = `<span class="frequency_label"><li>${meeting.frequency}</li></span>`;
    meetingBlock.appendChild(frequencyDiv);

    const table = document.createElement("table");
    table.classList.add("meeting-table");

    const tr = document.createElement("tr");
    const td = document.createElement("td");

    const nestedTable = document.createElement("table");
    nestedTable.classList.add("nested_table");

    meeting.dates.forEach((dateInfo) => {
      const nestedTr = document.createElement("tr");

      const dateTd = document.createElement("td");
      dateTd.innerHTML = `<div class="date_div">
                            <i class="fa-solid fa-info info_icon"></i>
                            <span>${dateInfo.date}</span>
                          </div>`;

      const dayTd = document.createElement("td");
      dayTd.textContent = dateInfo.day;

      const timeTd = document.createElement("td");
      timeTd.textContent = dateInfo.time;

      const agendaBtn = document.createElement("button");
      agendaBtn.classList.add("agenda_btn");
      agendaBtn.textContent = dateInfo.button;

      if (dateInfo.button === "Update") {
        agendaBtn.classList.add("update");
      } else if (dateInfo.button === "View MOM") {
        agendaBtn.classList.add("view-mom");
      }

      const agendaTd = document.createElement("td");
      agendaTd.innerHTML = `<div class="meeting_agenda">
                              <span>${dateInfo.agenda}</span>
                            </div>`;
      agendaTd.querySelector(".meeting_agenda").appendChild(agendaBtn);

      nestedTr.appendChild(dateTd);
      nestedTr.appendChild(dayTd);
      nestedTr.appendChild(timeTd);
      nestedTr.appendChild(agendaTd);

      nestedTable.appendChild(nestedTr);
    });

    td.appendChild(nestedTable);
    tr.appendChild(td);

    const departmentTd = document.createElement("td");
    departmentTd.textContent = meeting.department;

    const meetingTypeTd = document.createElement("td");
    meetingTypeTd.textContent = meeting.meetingType;

    const meetingIDTd = document.createElement("td");
    meetingIDTd.textContent = meeting.meetingID;

    const leaderTd = document.createElement("td");
    leaderTd.innerHTML = `<img src="${meeting.leader.image}" class="leader_img" alt="Leader" />
                          <span>${meeting.leader.name}</span>`;

    tr.appendChild(departmentTd);
    tr.appendChild(meetingTypeTd);
    tr.appendChild(meetingIDTd);
    tr.appendChild(leaderTd);

    table.appendChild(tr);
    meetingBlock.appendChild(table);

    container.appendChild(meetingBlock);
  });
});
