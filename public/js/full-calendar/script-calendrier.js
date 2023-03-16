window.onload = () => {
    // document.addEventListener("DOMContentLoaded", function() {

        let elementCalendrier = document.querySelector("#calendrier");

        //On instancie le calendrier
        let calendrier = new FullCalendar.Calendar(elementCalendrier, {
            // On appelle les composants 
            initialView    : 'dayGridWeek',
            locale         : 'fr',
            timeZone       : 'Europe/Paris',
            headerToolbar  : {
                start    : 'prev next today',
                center   : 'title',
                end      : 'dayGridMonth timeGridWeek dayGrid list'
            },
            firstDay       : 3,
            buttonText     : {
                today    : 'Aujoud\'hui',
                month    : 'Mois',
                dayGrid  : 'Jour',
                week     : 'Semaine',
                list     : 'Liste',
            },
            allDaySlot         : false,
            slotLabelInterval  : '01:00:00', // Show the time label every hour
            slotDuration       : '00:10:00', // Each time slot is 5 minutes long
            slotMinTime        : '09:00:00',
            scrollTime         : '14:00:00',

            events: "/admin/programmation/json",
            editable           : true,
        });
        
        calendar.on('eventChange', (e) => {
            
        })

        calendrier.render(); 
    
    // });
}