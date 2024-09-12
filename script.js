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
      frequency: "2x Weekly",
      dates: [
        {
          date: "14 Aug, 2024",
          day: "Wed",
          time: "8:00 AM - 8:30 AM",
          agenda: "Plannings ( Existing + New Posts)",
          button: "View MOM",
        },
        {
          date: "16 Aug, 2024",
          day: "Fri",
          time: "8:00 AM - 8:30 AM",
          agenda: "Recruitment + HRMS",
          button: "Update",
        },
      ],
      department: "Human Resources (HR)",
      meetingType: "Recurring",
      meetingID: "112244",
      leader: { name: "M.D Sir", image: "./assets/leader.png" },
    },
    {
      frequency: "1x Weekly",
      dates: [
        {
          date: "19 Aug, 2024",
          day: "Mon",
          time: "11:00 AM - 11:30 AM",
          agenda: "1 Hour Meeting",
          button: "Update",
        },
      ],
      department: "Procurement",
      meetingType: "Recurring",
      meetingID: "112244",
      leader: { name: "M.D Sir", image: "./assets/leader.png" },
    },
  ];

  const allSideMenus = document.querySelector(".all_side_menus");
  const container = document.querySelector(".container");
  const dashboard = document.querySelector(".dashboard");

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
        agendaBtn.addEventListener("click", function () {
          showUpdateUI(); // Trigger the function to show the new UI
        });
      } else if (dateInfo.button === "View MOM") {
        agendaBtn.classList.add("view-mom");
      }

      // if (dateInfo.button === "Update") {
      //   agendaBtn.classList.add("update");
      // } else if (dateInfo.button === "View MOM") {
      //   agendaBtn.classList.add("view-mom");
      // }

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

  // function showUpdateUI() {
  //   const newUIDesign = `
  //       <div class="agenda_page">
  //       <div class="agenda_intro">
  //         <i class="fa-solid fa-arrow-left arrow_left"></i>
  //         <div class="box">
  //           <p class="meeting_agenda_title">Meeting Agenda</p>
  //           <h2 class="meeting_agenda">Fund allocation</h2>
  //           <div class="labels">
  //             <span class="label"><li>3x Weekly</li> </span>
  //             <span class="label"><li>Department-Finance</li> </span>
  //           </div>
  //         </div>
  //         <button class="create_btn">Create Meeting</button>
  //       </div>
  //       <div class="view_type">
  //         <div class="view_div selected">
  //           <img class="view_icon" src="./assets/list.png" alt="" />
  //         </div>
  //         <div class="view_div">
  //           <img class="view_icon" src="./assets/grid.png" alt="" />
  //         </div>
  //         <div class="calendar">
  //           <span class="date">Aug, 2024</span>
  //           <i class="fa-solid fa-calendar calendar_icon"></i>
  //         </div>
  //       </div>

  //       <div class="agenda_lists">
  //         <div class="meeting">
  //           <div class="cover">
  //             <div class="counter">1.</div>
  //             <div class="details">
  //               <p>15 August, 2024 | Thursday</p>
  //               <span class="tag no-mom-tag">No MOM Added</span>
  //             </div>
  //             <i class="fa-solid fa-caret-down arrow_down"></i>
  //           </div>
  //           <div class="form">
  //             <textarea
  //               placeholder="Type discussed point here"
  //               type="textarea"
  //               class="textarea"
  //               rows="4"
  //             ></textarea>
  //           </div>
  //         </div>
  //         <div class="meeting">
  //           <div class="cover">
  //             <div class="counter">2.</div>
  //             <div class="details">
  //               <p>15 August, 2024 | Thursday</p>
  //               <div class="tags">
  //                 <span class="tag selected_tag">
  //                   <i class="fa-solid fa-circle-dot"></i>
  //                   <span>5 MOM</span>
  //                 </span>
  //                 <span class="tag">
  //                   <i class="fa-solid fa-clipboard"></i>
  //                   <span>3 Tasks</span>
  //                 </span>
  //               </div>
  //             </div>
  //             <i class="fa-solid fa-caret-down arrow_down"></i>
  //           </div>
  //         </div>
  //       </div>
  //     </div>
  //   `;

  //   // Replace the dashboard content with the new UI design
  //   dashboard.innerHTML = newUIDesign;

  //   const leftArrow = document.querySelector(".arrow_left");
  //   leftArrow.addEventListener("click", function () {
  //     location.reload(); // Reload the page to restore the original dashboard content
  //   });

  //   // Optionally, add an event listener to the cancel button to revert to the original view
  //   const cancelButton = document.querySelector(".cancel-btn");
  //   cancelButton.addEventListener("click", function () {
  //     location.reload(); // Refresh the page or handle UI reset
  //   });
  // }

  function showUpdateUI() {
    const newUIDesign = `
        <div class="agenda_page">
        <div class="agenda_intro">
          <i class="fa-solid fa-arrow-left arrow_left"></i>
          <div class="box">
            <p class="meeting_agenda_title">Meeting Agenda</p>
            <h2 class="meeting_agenda">Fund allocation</h2>
            <div class="labels">
              <span class="label"><li>3x Weekly</li> </span>
              <span class="label"><li>Department-Finance</li> </span>
            </div>
          </div>
          <button class="create_btn">Create Meeting</button>
        </div>
        <div class="view_type">
          <div class="view_div selected">
            <img class="view_icon" src="./assets/list.png" alt="" />
          </div>
          <div class="view_div">
            <img class="view_icon" src="./assets/grid.png" alt="" />
          </div>
          <div class="calendar">
            <span class="date">Aug, 2024</span>
            <i class="fa-solid fa-calendar calendar_icon"></i>
          </div>
        </div>

        <div class="agenda_lists">
          <div class="meeting">
            <div class="cover">
              <div class="counter">1.</div>
              <div class="details">
                <p>15 August, 2024 | Thursday</p>
                <span class="tag no-mom-tag">No MOM Added</span>
              </div>
              <i class="fa-solid fa-caret-down arrow_down"></i>
            </div>
            <div class="form" style="display: none;">
              <textarea
                placeholder="Type discussed point here"
                type="textarea"
                class="textarea"
                rows="4"
              ></textarea>
            </div>
          </div>
          <div class="meeting">
            <div class="cover">
              <div class="counter">2.</div>
              <div class="details">
                <p>15 August, 2024 | Thursday</p>
                <div class="tags">
                  <span class="tag selected_tag">
                    <i class="fa-solid fa-circle-dot"></i>
                    <span>5 MOM</span>
                  </span>
                  <span class="tag">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>3 Tasks</span>
                  </span>
                </div>
              </div>
              <i class="fa-solid fa-caret-down arrow_down"></i>
            </div>
            <div class="form" style="display: none;">
              <textarea
                placeholder="Type discussed point here"
                type="textarea"
                class="textarea"
                rows="4"
              ></textarea>
            </div>
          </div>
        </div>
      </div>
    `;

    // Replace the dashboard content with the new UI design
    dashboard.innerHTML = newUIDesign;

    // Get all covers and attach event listeners
    const covers = document.querySelectorAll(".cover");
    covers.forEach((cover) => {
      cover.addEventListener("click", function () {
        const form = cover.nextElementSibling;
        if (form.style.display === "none") {
          form.style.display = "block";
        } else {
          form.style.display = "none";
        }
      });
    });

    const leftArrow = document.querySelector(".arrow_left");
    leftArrow.addEventListener("click", function () {
      location.reload(); // Reload the page to restore the original dashboard content
    });
  }
});
