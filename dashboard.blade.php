@extends('admin::shiva.layout')

@section('page_title')
Dashboard
@stop

@push('css')
<!-- Any external css specific to the page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap-grid.min.css" />
<style>
 .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 10px;
    margin-top: 5px;
    .title {
      font-weight: 600;
      font-size: 28px;
      color: #20313a;
    }
    .create_btn {
      background: #016d24;
      color: #fff;
      box-shadow: 1px 1px 3px 0px #002c0ee5;
      border-radius: 5px;
      outline: none;
      border: none;
      padding: 7px 25px;
      font-size: 16px;
      cursor: pointer;
    }
  }

  .filters {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 10px;
    padding: 0px 10px;
    .left {
      display: flex;
      align-items: center;
      gap: 15px;
      .single_option:nth-child(1) {
        background: #016d24;
        box-shadow: -1px 1px 3px 0px #002c0ee5 inset,
          1px -1px 2px 0px #02ae3ae5 inset, -1px -1px 2px 0px #002c0e33 inset,
          1px 1px 2px 0px #002c0e33 inset, 1px -1px 2px 0px #002c0e80,
          -1px 1px 2px 0px #02ae3a4d;
        span {
          color: #fff;
        }
        span:nth-child(1) {
          border-right: 1px solid #fff;
          padding-right: 7px;
        }
      }
      .single_option {
        background: linear-gradient(135deg, #f9fffb 0%, #e1e8e3 100%);
        box-shadow: 1px 1px 3px 0px #c9cfcbe5, -1px -1px 2px 0px #ffffffe5,
          1px -1px 2px 0px #c9cfcb33, -1px 1px 2px 0px #c9cfcb33,
          -1px -1px 2px 0px #c9cfcb80 inset, 1px 1px 2px 0px #ffffff4d inset;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        min-width: 60px;
        span {
          color: #000;
          font-size: 16px;
          font-weight: 600;
        }
      }
    }
    .right {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 200px;
      background: linear-gradient(135deg, #f9fffb 0%, #e1e8e3 100%);
      box-shadow: 1px 1px 3px 0px #c9cfcbe5, -1px -1px 2px 0px #ffffffe5,
        1px -1px 2px 0px #c9cfcb33, -1px 1px 2px 0px #c9cfcb33,
        -1px -1px 2px 0px #c9cfcb80 inset, 1px 1px 2px 0px #ffffff4d inset;
      padding: 5px 15px;
      border-radius: 10px;
      border: 1px solid #20313a33;
      .date {
        color: #20313a;
        font-size: 16px;
        font-weight: 600;
      }
      .calendar_icon {
        color: #20313a;
        cursor: pointer;
      }
    }
  }

  .table_body {
    width: 98%;
    margin: auto;
    height: calc(100% - 180px);

    .meeting_header {
        width: calc(100% - 30px);
        margin: 15px auto;
      color: #525252;
      font-size: 14px;
      padding: 0px 8px;
      border-collapse: collapse;

      tr th {
        text-align: left;
        white-space: nowrap;
      }
      tr th:nth-child(1) {
        width: 12%;
      }
      tr th:nth-child(2) {
        width: 8%;
      }
      tr th:nth-child(3) {
        width: 15%;
      }
      tr th:nth-child(4) {
        width: 22%;
      }
      tr th:nth-child(5) {
        width: 10%;
      }
      tr th:nth-child(6) {
        width: 10%;
      }
      tr th:nth-child(7) {
        width: 10%;
      }
      tr th:nth-child(8) {
        width: 13%;
      }
    }

    .container {
      height: calc(100% - 55px);
      width: 100%;
      padding-right: 7px;
      overflow-y: scroll;
      margin-top: 10px;

      &::-webkit-scrollbar {
        width: 3px;
      }
      &::-webkit-scrollbar-track {
        background: transparent;
      }
      &::-webkit-scrollbar-thumb {
        background: rgb(161, 161, 161);
        height: 100px;
      }

      .meeting-block {
        background: linear-gradient(135deg, #f9fffb 0%, #e1e8e3 100%);
        box-shadow: 5px 5px 13px 0px #d5dcd7e5, -5px -5px 10px 0px #ffffffe5,
          5px -5px 10px 0px #d5dcd733, -5px 5px 10px 0px #d5dcd733,
          -1px -1px 2px 0px #d5dcd780 inset, 1px 1px 2px 0px #ffffff4d inset;
        border-radius: 8px;
        margin-bottom: 10px;
        padding: 10px 8px;
        border: 0.5px solid #009b1c;

        .meeting_frequency {
          width: 32%;
          display: flex;
          justify-content: end;

          .frequency_label {
            font-weight: 400;
            background: #d4d4d4;
            color: #00410c;
            border-radius: 5px;
            padding: 2px 10px;
            font-size: 14px;
          }
        }

        .meeting-table {
          width: 100%;
          border-collapse: collapse;

          tr td:nth-child(1) {
            width: 57%;
            padding: 12px 0px;
          }
          tr td:nth-child(2) {
            width: 10%;
          }
          tr td:nth-child(3) {
            width: 10%;
          }
          tr td:nth-child(4) {
            width: 10%;
          }
          tr td:nth-child(5) {
            width: 13%;
            padding-left: 5px;
          }

          .nested_table {
            border-right: 1px solid #c6e0dc;
            margin-right: 15px;
            td {
              border-bottom: 1px solid #c6e0dc;
            }
            tr td:nth-child(1) {
              width: 12%;
            }
            tr td:nth-child(2) {
              width: 8%;
            }
            tr td:nth-child(3) {
              width: 15%;
            }
            tr td:nth-child(4) {
              width: 22%;
            }
          }

          .date_div {
            display: flex;
            align-items: center;
            gap: 3px;

            .info_icon {
              font-size: 10px;
              color: #727272;
              padding: 2px 5px 3px 5px;
              border-radius: 4px;
              border: 1px solid #727272;
              cursor: pointer;
              &:hover {
                color: #000;
                border-radius: 1px solid #000;
              }
            }
          }
          .meeting_agenda {
            span {
              width: 50%;
              display: inline-block;
            }
            .agenda_btn {
              width: 40%;
              color: #fff;
              border-radius: 5px;
              border: none;
              padding: 3px 0px;
              cursor: pointer;
            }
            .view-mom {
              background: #016d24;
              box-shadow: 1px 1px 3px 0px #002c0ee5, -1px -1px 2px 0px #02ae3ae5,
                1px -1px 2px 0px #002c0e33, -1px 1px 2px 0px #002c0e33,
                -1px -1px 2px 0px #002c0e80 inset,
                1px 1px 2px 0px #02ae3a4d inset;
            }
            .update {
              background: #ff3518;
              box-shadow: 1px 1px 3px 0px #ff3518e5, -1px -1px 2px 0px #ff3518e5,
                1px -1px 2px 0px #ff351833, -1px 1px 2px 0px #ff351833,
                -1px -1px 2px 0px #ff351880 inset,
                1px 1px 2px 0px #ff35184d inset;
            }
          }

          td {
            color: #000;
            font-size: 15px;
            font-weight: 400;
          }

          .leader_img {
            border-radius: 50%;
            width: 30px;
            margin-right: 8px;
            vertical-align: middle;
          }
        }
      }
    }
  }
</style>
@endpush

@section('content-wrapper')
<div class="header">
        <h2 class="title">Meetings</h2>
        <button class="create_btn">Create Meeting</button>
      </div>
      <div class="filters">
        <div class="left">
          <div class="single_option">
            <span>All</span>
            <span>53</span>
          </div>
          <div class="single_option">
            <span>My Meeting</span>
          </div>
          <div class="single_option">
            <span>Meeting Count</span>
          </div>
        </div>
        <div class="right">
          <span class="date">Aug, 2024</span>
          <i class="fa-solid fa-calendar calendar_icon"></i>
        </div>
      </div>
      <section class="table_body">
        <table class="meeting_header">
          <tr>
            <th>Date</th>
            <th>Days</th>
            <th>Time</th>
            <th>Meeting Agenda</th>
            <th>Department</th>
            <th>Meeting Type</th>
            <th>Meeting ID</th>
            <th>Leader</th>
          </tr>
        </table>
        <div class="container"></div>
      </section>
@stop

@push('scripts')
<!-- any external scripts for the page, don't forget type="module" -->
<script type="module" src="<externalscripts>"></script>
<script>
    // const data=<?php echo json_encode($meetings) ?>;
    // console.log(data);
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

    const container = document.querySelector(".container");

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
// js specific to the page
</script>
@endpush