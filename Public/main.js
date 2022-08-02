const input = document.getElementById('citiesInput');
let sheets = document.getElementById('sheets');


$.post(
    '/weather',
    $('#weather').serialize(),
    function (msg) {
        sheets.innerHTML = '';
        let array = JSON.parse(msg);
        let i = 0;

        while (array[i].date !== '1 сен') {
            let container = document.createElement('div');
            container.style = 'width: 100px; text-align: left; background-color: #C6FF96FF; height: 100px; border-right: 1px solid black; border-bottom: 1px solid black; float: left';
            container.innerHTML = array[i].date
            sheets.appendChild(container)
            let tmax = document.createElement('div')
            tmax.innerHTML = '<strong>' + array[i].temperature_max + '</strong>'
            tmax.style = 'margin-top: 10px; text-align: right; margin-right: 10px'
            container.appendChild(tmax)
            let tmin = document.createElement('div')
            tmin.innerHTML ='Tmin '+ array[i].temperature_min
            tmin.style = 'margin-top: 10px;font-size: 12px; text-align: right; margin-right: 10px'
            container.appendChild(tmin)
            i++
        }
    }
)


let inputData = input.value;
$('#weather').on(
    'submit', function (e) {
        e.preventDefault();

        $.post(
            '/weather',
            $('#weather').serialize(),
            function (msg) {
                sheets.innerHTML = '';
                let array = JSON.parse(msg);
                let i = 0;

                while (array[i].date !== '1 сен') {
                    let container = document.createElement('div');
                    container.style = 'width: 100px; text-align: left; background-color: #C6FF96FF; height: 100px; border-right: 1px solid black; border-bottom: 1px solid black; float: left';
                    container.innerHTML = array[i].date
                    sheets.appendChild(container)
                    let tmax = document.createElement('div')
                    tmax.innerHTML = '<strong>' + array[i].temperature_max + '</strong>'
                    tmax.style = 'margin-top: 10px; text-align: right; margin-right: 10px'
                    container.appendChild(tmax)
                    let tmin = document.createElement('div')
                    tmin.innerHTML = array[i].temperature_min
                    tmin.style = 'margin-top: 10px; text-align: right; margin-right: 10px'
                    container.appendChild(tmin)
                    i++
                }
            }
        )
    }
)

