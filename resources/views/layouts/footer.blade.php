<!-- Footer opened -->
 <footer class="bg-white p-4">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center text-md-left">
              <p class="mb-0"> &copy; {{ trans('copyright_trans.copyright') }}
                <span id="copyright">
                    <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
                </span>.
                <a href="#"> {{ trans('copyright_trans.websiteName') }} </a> {{ trans('copyright_trans.rightsReserved') }}.
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="text-center text-md-right">
            <li class="list-inline-item"><a href="#">{{ trans('copyright_trans.termsLink') }} </a> </li>
            <li class="list-inline-item"><a href="#">{{ trans('copyright_trans.apiLink') }}</a> </li>
            <li class="list-inline-item"><a href="#">{{ trans('copyright_trans.privacyLink') }}</a> </li>
          </ul>
        </div>
      </div>
    </footer>
<!-- Footer closed -->
