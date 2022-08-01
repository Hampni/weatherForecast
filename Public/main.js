const input = document.getElementById('citiesInput')

let inputData = input.value
$('#weather').on(
    'submit', function (e) {
        e.preventDefault()

        $.post(
            '/weather',
            $('#weather').serialize(),
            function (msg) {

                console.log(msg)


            }
        )
    }
)

