<header
    id="landing-header"
    class="py-3 px-10 flex items-center fixed top-0 w-full justify-between z-40 text-white border-b border-gray-400 bg-black/50 backdrop-blur-lg transition-colors duration-500 ease-in-out"
>
    <div class="flex flex-grow basis-0">
        <a href="./">
            <img src="{{asset('images/logo.png')}}" alt="MadMotor" class="h-10" />
        </a>
    </div>

    <nav class="hidden xl:block sm:hidden">
        <ul
            class="flex text-lg transition-colors duration-500 text-current font-medium inline-block px-4 py-2 space-x-4"
        >
            <li><a class="transition-colors duration-500 text-current font-medium inline-block px-4 py-2" href="#">Vehiculos</a></li>
            <li><a class="transition-colors duration-500 text-current font-medium inline-block px-4 py-2" href="#">Piezas</a></li>

        </ul>
    </nav>

    <nav class="flex flex-grow justify-end basis-0">
        <ul
            class="flex text-lg transition-colors duration-500 text-current font-medium inline-block px-4 py-2 space-x-4"
        >
            <li class="hidden xl:block sm:hidden transition-colors duration-500 text-current font-medium inline-block px-3 py-2"><a href="#">Carrito</a></li>
            <li class=" transition-colors duration-500 text-current font-medium inline-block px-1 py-2 hidden xl:block sm:hidden"><a href="#">Iniciar Sesión</a></li>
            <li><a class="transition-colors duration-500 text-current font-medium inline-block px-3 py-2" href="#">Registrarse</a></li>
        </ul>
    </nav>

    <div
        id="menu-backdrop"
        class="
      absolute bg-black/5 backdrop-blur-lg rounded
      translate-x-[var(--left)] translate-y-[var(--top)]
      left-0 top-0
      w-[var(--width)] h-[var(--height)]
      transition-all duration-500
      ease-in-out opacity-0 -z-10
    "
    >
    </div>
</header>

<script>
    const listItem = document.querySelectorAll("#landing-header li");
    const menuBackDrop = document.querySelector("#menu-backdrop");

    listItem.forEach((item) => {
        item.addEventListener("mouseenter", () => {
            const rect = item.getBoundingClientRect();

            menuBackDrop.style.setProperty("--left", `${rect.left}px`);
            menuBackDrop.style.setProperty("--top", `${rect.top}px`);
            menuBackDrop.style.setProperty("--width", `${rect.width}px`);
            menuBackDrop.style.setProperty("--height", `${rect.height}px`);

            menuBackDrop.style.opacity = "1";
            menuBackDrop.style.visibility = "visible";
        });

        item.addEventListener("mouseleave", () => {
            menuBackDrop.style.opacity = "0";
            menuBackDrop.style.visibility = "hidden";
        });
    });
</script>

<script>
    const headerEl = document.querySelector("#landing-header");

    const observerOptions = {
        root: null,
        rootMargin: "0px",
        threshold: 0.9,
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const {isIntersecting} = entry;
            if (isIntersecting) {
                const color = entry.target.getAttribute("data-header-color");
                headerEl.style.color = color;
            }
        });
    }, observerOptions);

    const sectionElements = document.querySelectorAll(".landing-section");
    sectionElements.forEach((section) => observer.observe(section));
</script>
