    </body>
    <footer>

     @foreach($block as $bl)
        @if($bl->position == "footer" && $bl->status == 1)
             {!!$bl->content!!}
        @endif
     @endforeach

  

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
      <!-- Magnific Popup core JS file -->
      <script src="{{asset('assets_pasal/magnific-popup/jquery.magnific-popup.js')}}"></script>
      <script src="{{asset('assets_pasal/js/style.js?v=2.03')}}"></script>
    </footer>
    </html>