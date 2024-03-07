@extends('main')
@section('content')
    <div class="mt-5 p-5 bg-black">
    <div class="grid grid-cols-1 gap-x-8 gap-y-10 ui-not-focus-visible:outline-none sm:grid-cols-2 sm:gap-y-16 md:grid-cols-3"  role="tabpanel" tabindex="0">
        <div>
            <div class="group relative h-[17.5rem] transform overflow-hidden rounded-4xl">
                <div class="absolute bottom-6 left-0 right-4 top-0 rounded-4xl border transition duration-300 group-hover:scale-95 xl:right-6 border-blue-300"></div>
                <div class="absolute inset-0 bg-indigo-50" style="clip-path:url(#:R1bqnla:-0)">
                    <a href="{{route('vehiculos.adminIndex')}}">
                    <img alt="" fetchPriority="high" width="1120" height="560" decoding="async" class="absolute inset-0 h-full w-full object-cover transition duration-300 group-hover:scale-110" style="color:transparent" sizes="(min-width: 1280px) 17.5rem, (min-width: 1024px) 25vw, (min-width: 768px) 33vw, (min-width: 640px) 50vw, 100vw" src="https://img.freepik.com/foto-gratis/conduccion-automoviles-deportivos-carretera-asfaltada-noche-ia-generativa_188544-8052.jpg?w=900&t=st=1709483786~exp=1709484386~hmac=578131e5425057fbb577ed5de832c13972b80d9dc5e371dafccacbe6c5ce23a6&amp;w=3840&amp;q=75"/>
                    </a>
                </div>
            </div>
            <h3 class="mt-8 font-display text-xl font-bold tracking-tight text-slate-900 text-white">Vehiculos</h3>
            <p class="mt-1 text-base tracking-tight text-slate-500">Información sobre los vehiculos</p>
        </div>
        <div>
            <div class="group relative h-[17.5rem] transform overflow-hidden rounded-4xl">
                <div class="absolute bottom-6 left-0 right-4 top-0 rounded-4xl border transition duration-300 group-hover:scale-95 xl:right-6 border-indigo-300"></div>
                <div class="absolute inset-0 bg-indigo-50" style="clip-path:url(#:R1bqnla:-1)">
                   <a href="{{ route('piezas.index') }}">
                    <img alt="" fetchPriority="high" width="1120" height="560" decoding="async" class="absolute inset-0 h-full w-full object-cover transition duration-300 group-hover:scale-110" style="color:transparent" sizes="(min-width: 1280px) 17.5rem, (min-width: 1024px) 25vw, (min-width: 768px) 33vw, (min-width: 640px) 50vw, 100vw" src="https://th.bing.com/th/id/OIP.KfJHc987dlOGUVkAhwwcGAHaE8?rs=1&pid=ImgDetMain&amp;w=3840&amp;q=75"/>
                   </a>
                </div>
            </div>
            <h3 class="mt-8 font-display text-xl font-bold tracking-tight text-slate-900 text-white">Piezas</h3>
            <p class="mt-1 text-base tracking-tight text-slate-500">Información sobre las piezas</p>
        </div>
        <div>
            <div class="group relative h-[17.5rem] transform overflow-hidden rounded-4xl">
                <div class="absolute bottom-6 left-0 right-4 top-0 rounded-4xl border transition duration-300 group-hover:scale-95 xl:right-6 border-sky-300"></div>
                <div class="absolute inset-0 bg-indigo-50" style="clip-path:url(#:R1bqnla:-2)">
                    <a href="{{ route('categorias.index') }}">
                    <img alt="" fetchPriority="high" width="1120" height="560" decoding="async" class="absolute inset-0 h-full w-full object-cover transition duration-300 group-hover:scale-110" style="color:transparent" sizes="(min-width: 1280px) 17.5rem, (min-width: 1024px) 25vw, (min-width: 768px) 33vw, (min-width: 640px) 50vw, 100vw" src="https://www.elyaquemotors.com/wp-content/uploads/2021/02/2-nissan-ntec.jpg?w=3840&q=75"/>
                    </a>
                </div>
            </div>
            <h3 class="mt-8 font-display text-xl font-bold tracking-tight text-slate-900 text-white">Categorias</h3>
            <p class="mt-1 text-base tracking-tight text-slate-500">Información sobre las categorias</p>
        </div>
        <div>
            <div class="group relative h-[17.5rem] transform overflow-hidden rounded-4xl">
                <div class="absolute bottom-6 left-0 right-4 top-0 rounded-4xl border transition duration-300 group-hover:scale-95 xl:right-6 border-blue-300"></div>
                <div class="absolute inset-0 bg-indigo-50" style="clip-path:url(#:R1bqnla:-0)">
                   <a href="{{ route('personal.search') }}">
                    <img alt="" fetchPriority="high" width="1120" height="560" decoding="async" class="absolute inset-0 h-full w-full object-cover transition duration-300 group-hover:scale-110" style="color:transparent" sizes="(min-width: 1280px) 17.5rem, (min-width: 1024px) 25vw, (min-width: 768px) 33vw, (min-width: 640px) 50vw, 100vw" src="https://static.vecteezy.com/system/resources/previews/014/307/479/non_2x/call-center-personal-assistant-icon-cartoon-style-vector.jpg?w=3840&q=75"/>
                   </a>
                </div>
            </div>
            <h3 class="mt-8 font-display text-xl font-bold tracking-tight text-slate-900 text-white">Personal</h3>
            <p class="mt-1 text-base tracking-tight text-slate-500">Información sobre el personal</p>
        </div>
        <div>
            <div class="group relative h-[17.5rem] transform overflow-hidden rounded-4xl">
                <div class="absolute bottom-6 left-0 right-4 top-0 rounded-4xl border transition duration-300 group-hover:scale-95 xl:right-6 border-indigo-300"></div>
                <div class="absolute inset-0 bg-indigo-50" style="clip-path:url(#:R1bqnla:-1)">
                    <a href="{{ route('cliente.index') }}">
                    <img alt="" fetchPriority="high" width="1120" height="560" decoding="async" class="absolute inset-0 h-full w-full object-cover transition duration-300 group-hover:scale-110" style="color:transparent" sizes="(min-width: 1280px) 17.5rem, (min-width: 1024px) 25vw, (min-width: 768px) 33vw, (min-width: 640px) 50vw, 100vw" src="https://cdn.pixabay.com/photo/2016/03/31/20/37/client-1295901_1280.png?w=3840q=75"/>
                    </a>
                </div>
            </div>
            <h3 class="mt-8 font-display text-xl font-bold tracking-tight text-slate-900 text-white">Clientes</h3>
            <p class="mt-1 text-base tracking-tight text-slate-500">Información sobre los Clientes</p>
        </div>
    </div>
    </div>
@endsection
