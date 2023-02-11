<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />

    <script src="https://cdn.tailwindcss.com"></script>
    <title>EVENTO APERTO</title>
  </head>
  <body
    class="bg-fixed object-fill"
    style="background-image: url(img/background2luce.jpg)"
  >
    <!--NAVBAR-->
    <nav
      class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl"
    >
      <div class="flex items-center justify-between">
        <div class="navbar-logo items-center flex gap-2">
          <img
            class="h-12 w-12 shadow-xl"
            src="img/ClubbersLogo.png"
            alt="Clubbers"
          />
          <h2 class="invisible md:visible lg:visible">Clubbers</h2>
        </div>
        <div
          class="navbar-search-bar flex gap-4 p-2 bg-black backdrop-blur bg-opacity-40 rounded-2xl"
        >
          <button>
            <i
              class="uil uil-search p-3 rounded-full hover:bg-white hover:bg-opacity-20"
            ></i>
          </button>
          <input
            type="search"
            class="bg-black lg:px-20 py-2 rounded-full placeholder:text-center shadow-2xl"
            placeholder="connect with people..."
          />
        </div>
        <div class="navbar-options items-center md:flex lg:flex lg:gap-4 gap-2">
          <a href=""
            ><img
              src=""
              class="bg-black bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white"
              alt="notification"
          /></a>
          <h2 class="invisible lg:visible">ollare14</h2>
          <a href=""
            ><img
              src="img/shrek.jpg"
              class="rounded-full h-12 w-12 shadow-xl"
              alt="{{App\Http\Controllers\ImageController::getProPicAlt(Auth::user()->username)}}"
          /></a>
          <h2>
            <a href="/logout"><strong>LOGOUT</strong></a>
          </h2>
        </div>
      </div>
    </nav>

    <!-- BODY -->
    <div
      class="py-36 md:py-36 lg:py-24 lg:grid grid-cols-3 justify-between text-slate-200"
    >
      <div class="club-info">
        <div
          class="fixed w-[32%] p-3 top-34 flex items-center backdrop-blur bg-black bg-opacity-40 m-3 rounded-xl"
        >
          <div class="profile-pic-club">
            <img
              src="img/profilepic.jpeg"
              class="h-20 w-20 rounded-full"
              alt=""
            />
          </div>
          <div class="name-club pl-8"><a href="#">NRG</a></div>
        </div>
      </div>
      <div
        class="event-real mt-4 rounded-xl bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl h-full"
      >
        <div class="">
          <img class="rounded-t-xl" src="img/banner.png" alt="" />
          <div class="event-name">
            <h1 class="pl-5 p-2">NOME EVENTO</h1>
            <div class="event-info px-5 py-2">
              <div
                class="event-date flex text-center justify-between font-bold"
              >
                <p>11/02/2021</p>
                <p>11:00 - 4:30</p>
              </div>
              <p>Numero posti: 2000</p>
              <p class="py-2">
                "On the other hand, we denounce with righteous indignation and
                dislike men who are so beguiled and demoralized by the charms of
                pleasure of the moment, so blinded by desire, that they cannot
                foresee the pain and trouble that are bound to ensue; and equal
                blame belongs to those who fail in their duty through weakness
                of will, which is the same as saying through shrinking from toil
                and pain. These cases are perfectly simple and easy to
                distinguish. In a free hour, when our power of choice is
                untrammelled and when nothing prevents our being able to do what
                we like best, every pleasure is to be welcomed and every pain
                avoided. But in certain circumstances and owing to the claims of
                duty or the obligations of business it will frequently occur
                that pleasures have to be repudiated and annoyances accepted.
                The wise man therefore always holds in these matters to this
                principle of selection: he rejects pleasures to secure other
                greater pleasures, or else he endures pains to avoid worse
                pains."
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="club-info text-center">
        <div class="fixed p-3 top-34 w-[32%] items-center flex items-center backdrop-blur bg-black bg-opacity-40 m-3 rounded-xl hover:bg-white hover:bg-opacity-20">
            <div class="pl-[45%] rounded-xl text-center">
                <a href="/post/create">UPLOAD</a>
            </div>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
