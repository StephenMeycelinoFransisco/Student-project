<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <main class="main"></main>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Kamu Berhasil Login!</div>
                    <div class="p-6 text-gray-900">
                        <b-media right-align vertical-align="center">
                            <p class="mb-0">
                                Di sini Anda dapat mengakses dan mengelola informasi lengkap mengenai para siswa, termasuk data pribadi, hasil belajar, absensi, dan informasi penting lainnya. Dashboard ini memberikan kemudahan untuk memantau perkembangan akademik dan kehadiran siswa secara real-time, membantu Anda dalam mengambil keputusan yang tepat guna meningkatkan kualitas pendidikan."
                            </p>
                        </b-media>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
