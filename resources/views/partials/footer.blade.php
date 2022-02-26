<footer class="w-full bg-white mt-5 pb-8">
	<div class="container grid grid-cols-10 gap-10 divide-x py-10">
		<div class="col-span-10 md:col-span-5 px-10 md:p-0">
			<div class="flex items-center justify-center md:justify-start">
				<img src="{{ asset(config('settings.page_icon')) }}" class="w-12" alt="{{ config('settings.app_name') }}">
				<h2 class="text-lg ml-3 roboto-500 text-gray-800">{{ config('settings.app_name') }}</h2>
			</div>
			<p class="text-sm text-gray-600 text-justify mt-6">{{ config('settings.site_description') }}</p>
		</div>

		<div class="col-span-10 md:col-span-5 px-10">
			<div class="font-bold text-gray-600">Enlaces de interés</div>
			<ul>
				<li class="my-1"><a href="https://educacionbogota.edu.co/portal_institucional/" target="_blank" rel="noopener noreferrer" class="inline-flex p-3 px-5 text-sky-500 rounded-md w-full hover:bg-sky-200 hover:text-sky-600">Secretaría de educación</a></li>
				<li class="my-1"><a href="https://www.icbf.gov.co/" target="_blank" rel="noopener noreferrer" class="inline-flex p-3 px-5 text-sky-500 rounded-md w-full hover:bg-sky-200 hover:text-sky-600">Bienestar familiar</a></li>
				<li class="my-1"><a href="https://www.educacionbogota.edu.co/portal_matriculas/proceso-de-matricula/" target="_blank" rel="noopener noreferrer" class="inline-flex p-3 px-5 text-sky-500 rounded-md w-full hover:bg-sky-200 hover:text-sky-600">Matrículas</a></li>
				<li class="my-1"><a href="https://www.adres.gov.co/BDUA/Consulta-Afiliados-BDUA" target="_blank" rel="noopener noreferrer" class="inline-flex p-3 px-5 text-sky-500 rounded-md w-full hover:bg-sky-200 hover:text-sky-600">ADRES</a></li>
			</ul>
		</div>
	</div>

	<div class="container text-center bg-sky-200 text-sky-600 py-1 px-10 text-sm rounded-full">&copy2022 Todos los derechos reservados | Diseñado y administrado por Carlos Rodriguez & Lic. José Luis Suárez desde 2019</div>
</footer>