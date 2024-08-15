 @if (Session::has('success'))
     <script>
         Toastify({
             text: "{{ Session::get('success') }}",
             duration: 3000,
             newWindow: true,
             close: true,
             gravity: "top", // `top` or `bottom`
             position: "right", // `left`, `center` or `right`
             stopOnFocus: true, // Prevents dismissing of toast on hover
             style: {
                 background: "#28a745",
             },
             onClick: function() {} // Callback after click
         }).showToast();
     </script>
 @endif
 @if (Session::has('error'))
     <script>
         Toastify({
             text: "{{ Session::get('error') }}",
             duration: 3000,
             newWindow: true,
             close: true,
             gravity: "bottom", // `top` or `bottom`
             position: "right", // `left`, `center` or `right`
             stopOnFocus: true, // Prevents dismissing of toast on hover
             style: {
                 background: "#e3342f",
                 width: "444px",
                 display: 'flex',
                 justifyContent: 'space-between'
             },
             onClick: function() {} // Callback after click
         }).showToast();
     </script>
 @endif
