
<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <title>Sport&Theraphy Physical </title>
        <link href="resources/output.css" rel="stylesheet">
        <link rel="icon" href="sources/logos/spt.ico" type="image/x-icon">
        <script src="resources/js/jquery-3.7.1.js"></script>
        <script src="../node_modules/chart.js/dist/chart.umd.js"></script>
        <script src="resources/js/datatables.min.css"></script>
        <script src="resources/js/datatables.min.js"></script>
        <script src="resources/js/dashboard.js"></script>
        <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="bg-slate-100 ">
    <div class="flex w-full h-full">
        <header class="w-auto px-6 h-screen bg-slate-100 shadow-lg shadow-cyan-500/50 border-r-2 border-gray-200">
            <nav class="flex flex-col gap-10 h-full " aria-label="Global">
                <div class="flex w-full border-gray-200 border-b-2 ">
                    <a onclick="loadContent('pages/admin/dashboard/index.php');return false" class="m-3 cursor-pointer">
                        <span class="sr-only"></span>
                        <img class="w-40 " src="sources/logos/logo_inicio2.png" alt="">
                    </a>
                </div>
                <div class="grid grid-row self-center ">
                    <div class="flex inline-block space-x-2 my-4">
                        <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.4 3H4.6C4.03995 3 3.75992 3 3.54601 3.10899C3.35785 3.20487 3.20487 3.35785 3.10899 3.54601C3 3.75992 3 4.03995 3 4.6V8.4C3 8.96005 3 9.24008 3.10899 9.45399C3.20487 9.64215 3.35785 9.79513 3.54601 9.89101C3.75992 10 4.03995 10 4.6 10H8.4C8.96005 10 9.24008 10 9.45399 9.89101C9.64215 9.79513 9.79513 9.64215 9.89101 9.45399C10 9.24008 10 8.96005 10 8.4V4.6C10 4.03995 10 3.75992 9.89101 3.54601C9.79513 3.35785 9.64215 3.20487 9.45399 3.10899C9.24008 3 8.96005 3 8.4 3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19.4 3H15.6C15.0399 3 14.7599 3 14.546 3.10899C14.3578 3.20487 14.2049 3.35785 14.109 3.54601C14 3.75992 14 4.03995 14 4.6V8.4C14 8.96005 14 9.24008 14.109 9.45399C14.2049 9.64215 14.3578 9.79513 14.546 9.89101C14.7599 10 15.0399 10 15.6 10H19.4C19.9601 10 20.2401 10 20.454 9.89101C20.6422 9.79513 20.7951 9.64215 20.891 9.45399C21 9.24008 21 8.96005 21 8.4V4.6C21 4.03995 21 3.75992 20.891 3.54601C20.7951 3.35785 20.6422 3.20487 20.454 3.10899C20.2401 3 19.9601 3 19.4 3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19.4 14H15.6C15.0399 14 14.7599 14 14.546 14.109C14.3578 14.2049 14.2049 14.3578 14.109 14.546C14 14.7599 14 15.0399 14 15.6V19.4C14 19.9601 14 20.2401 14.109 20.454C14.2049 20.6422 14.3578 20.7951 14.546 20.891C14.7599 21 15.0399 21 15.6 21H19.4C19.9601 21 20.2401 21 20.454 20.891C20.6422 20.7951 20.7951 20.6422 20.891 20.454C21 20.2401 21 19.9601 21 19.4V15.6C21 15.0399 21 14.7599 20.891 14.546C20.7951 14.3578 20.6422 14.2049 20.454 14.109C20.2401 14 19.9601 14 19.4 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.4 14H4.6C4.03995 14 3.75992 14 3.54601 14.109C3.35785 14.2049 3.20487 14.3578 3.10899 14.546C3 14.7599 3 15.0399 3 15.6V19.4C3 19.9601 3 20.2401 3.10899 20.454C3.20487 20.6422 3.35785 20.7951 3.54601 20.891C3.75992 21 4.03995 21 4.6 21H8.4C8.96005 21 9.24008 21 9.45399 20.891C9.64215 20.7951 9.79513 20.6422 9.89101 20.454C10 20.2401 10 19.9601 10 19.4V15.6C10 15.0399 10 14.7599 9.89101 14.546C9.79513 14.3578 9.64215 14.2049 9.45399 14.109C9.24008 14 8.96005 14 8.4 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a onclick="loadContent('pages/admin/dashboard/index.php');return false" target="_blank" class="  hover:bg-gray-100
                         hover:text-black rounded-lg text-gray-600  font-bold  cursor-pointer text-xl" >Dashboard</a>
                    </div>
                    <div class="flex inline-block space-x-2 my-4">
                        <svg width="25px"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.5 11.5H14.5L13 14.5L11 8.5L9.5 11.5H8.5M11.9932 5.13581C9.9938 2.7984 6.65975 2.16964 4.15469 4.31001C1.64964 6.45038 1.29697 10.029 3.2642 12.5604C4.75009 14.4724 8.97129 18.311 10.948 20.0749C11.3114 20.3991 11.4931 20.5613 11.7058 20.6251C11.8905 20.6805 12.0958 20.6805 12.2805 20.6251C12.4932 20.5613 12.6749 20.3991 13.0383 20.0749C15.015 18.311 19.2362 14.4724 20.7221 12.5604C22.6893 10.029 22.3797 6.42787 19.8316 4.31001C17.2835 2.19216 13.9925 2.7984 11.9932 5.13581Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a onclick="loadContent('pages/admin/pacient/index.php');return false"  class="hover:bg-gray-100 hover:text-black
                        rounded-lg text-gray-600  font-bold hoover:text-blue-500  cursor-pointer text-xl" >Pacientes</a>
                    </div>
                    <div class="flex inline-block space-x-2 my-4 ">
                        <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 12H18L15 21L9 3L6 12H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a onclick="loadContent('pages/admin/medic/index.php');return false" class=" hover:bg-gray-100 hover:text-black
                        rounded-lg text-gray-600  font-bold hoover:text-blue-500  cursor-pointer text-xl" >Medicos</a>
                    </div>
                    <div class="flex inline-block space-x-2 my-4">
                        <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 18L18 20L22 16M22 10H2M22 12V8.2C22 7.0799 22 6.51984 21.782 6.09202C21.5903 5.7157 21.2843 5.40974 20.908 5.21799C20.4802 5 19.9201 5 18.8 5H5.2C4.0799 5 3.51984 5 3.09202 5.21799C2.7157 5.40973 2.40973 5.71569 2.21799 6.09202C2 6.51984 2 7.0799 2 8.2V15.8C2 16.9201 2 17.4802 2.21799 17.908C2.40973 18.2843 2.71569 18.5903 3.09202 18.782C3.51984 19 4.0799 19 5.2 19H12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a onclick="loadContent('404.php');return false" target="_blank" class="  hover:bg-gray-100
                         hover:text-black rounded-lg text-gray-600  font-bold  cursor-pointer text-xl" >Pagos</a>
                    </div>
                    <div class="flex inline-block space-x-2 my-4">
                        <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 5C21 6.65685 16.9706 8 12 8C7.02944 8 3 6.65685 3 5M21 5C21 3.34315 16.9706 2 12 2C7.02944 2 3 3.34315 3 5M21 5V19C21 20.66 17 22 12 22C7 22 3 20.66 3 19V5M21 9.72021C21 11.3802 17 12.7202 12 12.7202C7 12.7202 3 11.3802 3 9.72021M21 14.44C21 16.1 17 17.44 12 17.44C7 17.44 3 16.1 3 14.44" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a onclick="loadContent('pages/admin/backups/index.php');return false" target="_blank" class="  hover:bg-gray-100
                         hover:text-black rounded-lg text-gray-600  font-bold  cursor-pointer text-xl" >Respados</a>
                    </div>
                    <div class="flex inline-block space-x-2 my-4 ">
                        <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 8L22 12M22 12L18 16M22 12H9M15 4.20404C13.7252 3.43827 12.2452 3 10.6667 3C5.8802 3 2 7.02944 2 12C2 16.9706 5.8802 21 10.6667 21C12.2452 21 13.7252 20.5617 15 19.796" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a onclick="loadContent('404.php');return false" class="  hover:bg-gray-100 hover:text-black
                        rounded-lg text-gray-600  font-bold hoover:text-blue-500  cursor-pointer text-xl" >Salir</a>
                    </div>
                </div>
            </nav>
        </header>
        <!--- TITLE--->

        <div class="w-full bg-white">
            <div class="flex bg-white p-4 border-y-2 border-gray-200 mb-5 ">
                <div class="">
                    <p class="text-2xl font-extrabold">Buenos Días, Dr. Oswaldo </p>
                    <p class="text-md text-gray-500">Espero que tengas un bonito día porqué hoy hay 80 pacientes agendados para ti.</p>
                </div>
                <div>

                </div>
            </div>

            <div class="" id="MainContent">

            </div>
            <br>
        </div>
    </div>


    <footer class="bg-main text-black text-center py-4  bottom-0 w-full">
            <p>&copy; 2024 <strong>Sport & Theraphy Physical </strong> Todos los derechos reservados.</p>
    </footer>
    </body>
</html>

<script src="resources/js/app.js"></script>

