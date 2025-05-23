<?php require 'partials/head.php'; ?>

<?php require 'partials/nav.php';  ?>


<?= showToast(); ?>
<main>
  <div class="mx-auto w-full">
    <div class="relative h-full bg-white pt-[50px] ">
      <div class="container mx-auto">
        <div class="mx-4 flex flex-wrap items-center">
          <div class="w-full px-4 lg:w-5/12">
            <div class="flex flex-col justify-center items-center hero-content">
              <h1
                class="mb-5 text-4xl font-bold leading-[1.208]! text-dark sm:text-[42px] lg:text-[40px] xl:text-5xl">
                Tired of keeping track <br> of your notes?
              </h1>
              <p class="mb-8 max-w-[480px] text-black-600 text-body-color dark:text-dark-6">
               Keep your notes safe and organized with our easy-to-use note-taking website!
              </p>
              <ul class="flex flex-wrap items-center">
                <li>
                  <a href="/notes"
                    class="inline-flex items-center justify-center rounded-md bg-primary px-6 py-3 text-center text-black-600 font-medium text-white hover:bg-blue-dark lg:px-7">
                    Try it Now!
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="hidden px-4 lg:block lg:w-1/12"></div>
          <div class="w-full px-4 lg:w-6/12">
            <div class="lg:ml-auto lg:text-right">
              <div class="relative z-10 inline-block pt-11 lg:pt-0">
                <img src="/assets/images/hero.jpg" alt="hero"
                  class="max-w-full lg:ml-auto rounded-tl-3xl rounded-bl-3xl" />
                <span class="absolute -bottom-8 -left-8 z-[-1]">
                  <svg width="93" height="93" viewBox="0 0 93 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="2.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="2.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="2.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="2.5" cy="90.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="90.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="90.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="90.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="90.5" r="2.5" fill="#3056D3" />
                  </svg>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>



<?php require 'partials/footer.php'; ?>