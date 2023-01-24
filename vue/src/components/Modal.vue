<template>
   <div
        class="relative z-10"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
    >
        <div
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        ></div>

      
            <div
                class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
            >
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                >
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-15 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10"
                            >
                            <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 48 48"
                        width="100px"
                        height="100px"
                       
                      
                    >
                        <title>checkmark, approved, accepted</title>
                        <g>
                            <path
                                d="M24,4A20,20,0,1,0,44,24,20.023,20.023,0,0,0,24,4Zm0,38A18,18,0,1,1,42,24,18.02,18.02,0,0,1,24,42Z"
                                fill="#3094c5"
                            />
                            <path
                                d="M30.2188,18.375,22.917,27.502l-4.21-4.209a1,1,0,0,0-1.414,1.414l5,5A1.001,1.001,0,0,0,23,30a.5185.5185,0,0,0,.0557-.002.9984.9984,0,0,0,.7256-.373l8-10a1,1,0,0,0-1.5625-1.25Z"
                                fill="#3094c5"
                            />
                        </g>
                    </svg>

                            </div>

                            <div
                                class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                            >
                                <h3
                                    class="text-lg font-medium leading-6 text-gray-900"
                                    id="modal-title"
                                >
                                    La campaña ha sido creada de manera exitosa!
                                </h3>

                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                    >
                        <button
                            type="button"
                            data-dismiss="modal" aria-label="Close" id="close"
                            data-mdb-dismiss="modal"
                            class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        >
                            Cerar
                        </button>
                    </div>
                </div>
            </div>
    
    </div>
</template>

<script setup>

</script>
