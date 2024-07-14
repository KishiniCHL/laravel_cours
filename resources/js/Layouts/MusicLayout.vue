<template>
  <div>
    <nav class="bg-pink-100">
      <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-20 items-center justify-between">
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">

            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <Link :href="route('tracks.index')"
                  class="rounded-md px-3 py-2 text-lm font-medium text-gray-500 hover:underline focus:underline"
                  :class="[route().current().includes('tracks') ? 'underline text-gray-500' : '']">
                Musiques
                </Link>
                <Link :href="route('playlists.index')"
                  class="rounded-md px-3 py-2 text-lm font-medium text-gray-500 hover:underline focus:underline"
                  :class="[route().current().includes('playlists') ? 'underline text-gray-500' : '']">
                Playlists
                </Link>

                <Link v-if="$page.props.auth.user" :href="route('api-keys.index')"
                  class="rounded-md px-3 py-2 text-lm font-medium text-gray-500 hover:underline focus:underline"
                  :class="[route().current().includes('playlists/api') ? 'underline text-gray-500' : '']">
                  Clés API
                </Link>
              </div>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <div class="relative ml-3">
              <Link v-if="!$page.props.auth.user" :href="route('login')"
                class="text-pink-700 hover:text-white border border-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-pink-400 dark:text-pink-400 dark:hover:text-white dark:hover:bg-pink-500 dark:focus:ring-pink-900 mr-3">
              Se connecter </Link>
              <Link v-if="!$page.props.auth.user" :href="route('register')"
                class="text-pink-700 hover:text-white border border-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-pink-400 dark:text-pink-400 dark:hover:text-white dark:hover:bg-pink-500 dark:focus:ring-pink-900 mr-3">
              Créer un compte</Link>
              <Link v-if="$page.props.auth.user" :href="route('logout')" as="button" method="POST"
                class="text-pink-700 hover:text-white border border-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-pink-400 dark:text-pink-400 dark:hover:text-white dark:hover:bg-pink-500 dark:focus:ring-pink-900">
              Se déconnecter</Link>
            </div>

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button type="button"
                  class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                  id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="px-16">
      <div class="flex justify-between items-center">
        <h4 class="text-3xl font-bold my-6">
          <slot name="title" />
        </h4>
        <div>
          <slot name="action" />
        </div>
      </div>
      <slot name="content" />
    </div>
  </div>
</template>

<script>
export default {
  name: 'MusicLayout',
}
</script>