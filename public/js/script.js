  var modal = document.getElementById('BayarButton');
  function printStruk() {
    modal.scrollTo(0,0);
    window.print();
  }

  document.addEventListener('click', function() {
    console.log('hello world');

  })

  // show password
    function showPassword() {
        const toggle = document.getElementById('toggle');
        const passwordInput = document.getElementById('password');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }

        if (toggle.getAttribute('name') === 'eye') {
            toggle.setAttribute('name', 'eye-off');;
        } else {
          toggle.setAttribute('name', 'eye');;
        }
    }
  // akhir show password

  // Location API
  const alamat = document.getElementById('alamat');
  const pelengkap_alamat = document.getElementById('pelengkap-alamat');
  let count = 0;

  alamat.addEventListener('input', (event) => {
    getLocation(event.target.value);
  })
  
  document.addEventListener('click', () => {
    if (document.activeElement !== alamat) {
      pelengkap_alamat.innerHTML = '';
    }
  })

  function getLocation(location) {
    pelengkap_alamat.innerHTML = '';
    

    var requestOptions = {
      method: 'GET',
    };
    
    fetch(`https://api.geoapify.com/v1/geocode/autocomplete?text=${location}&type=street&apiKey=e66528e63ead4944b39548e1345c682b`, requestOptions)
    .then(response => response.json())
    .then(result =>
      result.features.forEach(function(item) {
            if (count < 5) {
            // Buat elemen <div> baru untuk setiap item dalam hasil
            var newDiv = document.createElement("div");
            newDiv.className = "w-full cursor-pointer py-2 px-3 hover:bg-gray-200 alamat-pilih";
            newDiv.innerHTML = item.properties.formatted;
            
            // Tambahkan elemen <div> baru ke dalam elemen dengan id "pelengkap-alamat"
            pelengkap_alamat.appendChild(newDiv);
  
            const alamatPilih = document.querySelectorAll('.alamat-pilih');
            alamatPilih.forEach(element => {
              element.addEventListener('click', () => {
                alamat.value = element.innerHTML;
                pelengkap_alamat.innerHTML = '';
              })
            });
            count = count + 1
            }
        }),
        count = 0
      )
      .catch(error => console.log('error', error));
    
  }
  // Akhir Location API