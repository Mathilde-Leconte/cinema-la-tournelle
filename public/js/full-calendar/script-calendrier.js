window.addEventListener('load', () => {
    let elementCalendrier = document.querySelector("#calendrier");

    if (elementCalendrier !== null) {

        let calendrier = new FullCalendar.Calendar(elementCalendrier, {
            initialView: 'dayGridWeek',
            locale: 'fr',
            // timeZone: 'Europe/Paris',
            nowIndicator : true,
            headerToolbar: {
                start: 'prev next today',
                center: 'title',
                end: 'dayGridMonth timeGridWeek dayGrid list'
            },
            firstDay: 3,
            buttonText: {
                today: 'Aujoud\'hui',
                month: 'Mois',
                dayGrid: 'Jour',
                week: 'Semaine',
                list: ' Liste',
            },
            allDaySlot: false,
            slotLabelInterval: '01:00:00',
            slotDuration: '00:10:00',
            slotMinTime: '09:00:00',
            scrollTime: '14:00:00',

            events: "/admin/programmation/json",
            editable: true,
        });

        calendrier.on('eventChange', function (info) {

        let event = info.event;
            console.log('toto');
            console.log(event.start);
            let seanceId = event.id;
            let start = event._instance.range.start;
            let end = event._instance.range.end;
            console.log(start);
            let data = {
                'start': start,
                'end': end,
            };
            console.log(data);
            console.log(info);

            let url = "/admin/full/calendar/" + seanceId + "/edit";
            console.log(url)
            fetch(url, {
                method: 'PUT',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                console.log('Seance updated successfully!');
                // console.log(data);
            }).catch(error => {
                console.error('Error updating seance:', error);
            });
        });


        calendrier.render();
    }
});
