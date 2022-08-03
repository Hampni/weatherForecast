const input = document.getElementById('citiesInput')
const sheets = document.getElementById('sheets')
let error = document.querySelector('.error')

$.post(
  '/weather',
  $('#weather').serialize(),
  function (msg) {

    sheets.innerHTML = ''
    const array = JSON.parse(msg)
    let i = 0

    while (array[i].date !== '1 сен') {
      const container = document.createElement('div')
      container.style = 'width: 100px; text-align: left; background-color: #C6FF96FF; height: 100px; border-right: 1px solid black; border-bottom: 1px solid black; float: left'
      sheets.appendChild(container)
      const number = document.createElement('div')
      number.innerHTML = array[i].date
      container.appendChild(number)
      const icon = document.createElement('img')
      icon.src = '/Public/Images/GismeteoIcons/' + array[i].image + '.svg'
      icon.style = 'position: absolute; '
      container.appendChild(icon)
      const tmax = document.createElement('div')
      tmax.innerHTML = '<strong>' + array[i].temperature_max + '</strong>'
      tmax.style = 'margin-top: 20px; text-align: right; margin-right: 5px'
      container.appendChild(tmax)
      const tmin = document.createElement('div')
      tmin.innerHTML = 'Tmin ' + array[i].temperature_min
      tmin.style = 'margin-top: 10px;font-size: 12px; text-align: right; margin-right: 5px'
      container.appendChild(tmin)
      i++
    }
  }
)

$('#weather').on(
  'submit', function (e) {
    e.preventDefault()

    $.post(
      '/weather',
      $('#weather').serialize(),
      function (msg) {
          const array = JSON.parse(msg)

          if (array['message']) {
              error.innerHTML = array['message']
              error.style.color = 'red'
          } else {
              error.innerHTML = ''
              sheets.innerHTML = ''
              let i = 0
              while (array[i].date !== '1 сен') {
                  const container = document.createElement('div')
                  container.style = 'width: 100px; text-align: left; background-color: #C6FF96FF; height: 100px; border-right: 1px solid black; border-bottom: 1px solid black; float: left'
                  sheets.appendChild(container)
                  const number = document.createElement('div')
                  number.innerHTML = array[i].date
                  container.appendChild(number)
                  const icon = document.createElement('img')
                  icon.src = '/Public/Images/GismeteoIcons/' + array[i].image + '.svg'
                  icon.style = 'position: absolute; '
                  container.appendChild(icon)
                  const tmax = document.createElement('div')
                  tmax.innerHTML = '<strong>' + array[i].temperature_max + '</strong>'
                  tmax.style = 'margin-top: 20px; text-align: right; margin-right: 5px'
                  container.appendChild(tmax)
                  const tmin = document.createElement('div')
                  tmin.innerHTML = 'Tmin ' + array[i].temperature_min
                  tmin.style = 'margin-top: 10px;font-size: 12px; text-align: right; margin-right: 5px'
                  container.appendChild(tmin)
                  i++
              }
          }
      }
    )
  }
)
