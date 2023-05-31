const parser = new DOMParser();

// Get references to the switch toggle button and the calendar views
const switchToggle = document.querySelector('.switches-container');
const wrapper = document.getElementById('calendar');
const steps = document.querySelectorAll('.step');
const todayButton = document.getElementById('todayButton');

const dayBlocks = document.querySelectorAll('.day-block')

// console.log(todayButton);

const switchView = (e) => {

  let view = e.target.value;
  if (!view) {
    view = e.target.dataset.view;
  }
  if (view) {
    let query = `view=${view}`;
    if (e.target.dataset.date) {
      query = `${query}&date=${e.target.dataset.date}`;
    }
    if (view === "today" || view === "week") {
      view = "week";
      const today = new Date();
      const todayStr = `${today.getFullYear()}-${today.getMonth() + 1}-${today.getDate()}`;
      query = `view=week&date=${todayStr}`;
    }
    fetch(`together.php?${query}`)
      .then(response => response.text())
      .then(text => {
        wrapper.innerHTML = "";
        const htmlDocument = parser.parseFromString(text, "text/html")
        const calendarView = htmlDocument.getElementById('calendarView')
        wrapper.appendChild(calendarView)
      })
      .then(() => {
        const steps = wrapper.querySelectorAll('.step');
        const todayButton = document.getElementById('todayButton');
        const dayBlocks = wrapper.querySelectorAll('.day-block');




        for (let i = 0; i < steps.length; i++) {
          steps[i].addEventListener('click', (e) => switchView(e));
        }
        todayButton.addEventListener('click', (e) => switchView(e));
        for (let i = 0; i < dayBlocks.length; i++) {
          dayBlocks[i].addEventListener('click', (e) => showEvents(e), true);
        }

      });

  }
}
const showEvents = (e) => {
  console.log(e.target);
  console.log(e.target.dataset.date);

  const eventsWrap = document.querySelector('.eventsWrap');
  const eventsBlocks = eventsWrap.querySelectorAll(".dayEvents")
  const blocktoshow = document.getElementById(`events-${e.target.dataset.date}`)
  const daysWrap = document.querySelector('.daysWrap');
  const selectedDays = daysWrap.querySelectorAll('span.selected');
  for (let i = 0; i < selectedDays.length; i++) {
    selectedDays[i].classList.remove('selected');
  }
  if (e.target.classList.contains('day-block')) {
    e.target.querySelector("span").classList.add("selected");
  }else if(e.target.tagName === 'SPAN'){
    e.target.classList.add("selected");
  }else if(e.target.tagName === 'DIV'){
    e.target.previousElementSibling.classList.add('selected');
  }
  if (eventsBlocks.length > 0) {
    eventsBlocks.forEach(block => {
      block.classList.add("d-none")
    })
  }
  if (blocktoshow) {
    blocktoshow.classList.remove("d-none")
  }
}
switchToggle.addEventListener('click', (e) => switchView(e));
for (let i = 0; i < steps.length; i++) {
  steps[i].addEventListener('click', (e) => switchView(e));
}
todayButton.addEventListener('click', (e) => switchView(e));
for (let i = 0; i < dayBlocks.length; i++) {
  dayBlocks[i].addEventListener('click', (e) => showEvents(e), true);
}

















