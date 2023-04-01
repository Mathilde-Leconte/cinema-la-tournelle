

const dateRangePicker = document.querySelector('#date-range-picker');

const picker = $(dateRangePicker).daterangepicker({
    opens: 'left',
    locale: {
        format: 'YYYY-MM-DD'
    }
}, function (start, end, label) {
    console.log("Une nouvelle sélection de date à était faite: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
});

const button = document.querySelector('#affiche-bouton');

button.addEventListener('click', () => {
    let selectedDates = $('#date-range-picker').val();
    console.log(selectedDates);
selectedDates = selectedDates.split(/\s+-\s+/);
    console.log(selectedDates);
    console.log($('#date-range-picker').val());
    console.log(selectedDates.length);
    let startDate = moment(selectedDates[0].trim(), 'YYYY-MM-DD').format('YYYY-MM-DD');
    console.log(startDate);
    let endDate = moment(selectedDates[1].trim(), 'YYYY-MM-DD').format('YYYY-MM-DD');
    console.log(endDate);

    const dateRange = {
        start: new Date(startDate).toISOString(),
        end: new Date(endDate).toISOString()
    };



    const url = '/programmation/json?' +
        'start=' + encodeURIComponent(dateRange.start) +
        '&end=' + encodeURIComponent(dateRange.end);

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dateRange)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);

        })

// Send the date range to the server using AJAX
$.ajax({
    url: "{{ path('app_admin_affichator_generate') }}",
    type: "POST",
    data: {
        start: dateRange.start,
        end: dateRange.end
    },
    success: function(response) {
        console.log(response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
    }
});

        
    fetch('/affichator/generate', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dateRange)
    })
        .then(response => response.blob())
        .then(blob => {
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'document.docx');
            document.body.appendChild(link);
            link.click();
            link.remove();
        })
        .catch(error => {
            console.error(error);
            alert('Une erreur est survenue lors de la récupération des événements.');
        });
});