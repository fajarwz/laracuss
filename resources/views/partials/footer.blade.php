<footer id="about-us" class="py-80px">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 mb-5 mb-lg-0">
          <img src="{{ url('assets/images/logo.png') }}" alt="Laracuss logo" class="h-32px mb-4">
          <p class="text-white">Empowering the Laravel community<br/>to connect. share and learn.</p>
        </div>
        <div class="col-12 col-lg-6 me-auto">
          <div class="d-flex flex-column flex-lg-row justify-content-end">
            <div class="d-flex flex-column me-140px mb-3 mb-lg-0">
              <p class="fw-bold fs-5 text-white text-nowrap">
                Contact Us
              </p>
              <ul class="list-unstyled">
                <li class="text-white"><a href="mailto:hi@laracuss.com">hi@laracuss.com</a></li>
              </ul>
            </div>
            <div class="d-flex flex-column">
              <p class="fw-bold fs-5 text-white">Links</p>
              <ul class="list-unstyled">
                <li class="text-white mb-2"><a href="{{ route('home') }}">Home</a></li>
                <li class="text-white mb-2"><a href="{{ route('discussions.index') }}">Discussions</a></li>
                <li class="text-white mb-2"><a href="{{ route('home') }}#about-us">About Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</footer>