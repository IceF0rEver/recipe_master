<div x-data="{ open: false }" class="bg-gray-800 relative">
<nav class="shadow-md">
        <div class="container mx-auto px-4">
          <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
              <a class="text-white font-bold text-xl flex items-center" href="#">
                <i class="fas fa-utensils text-yellow-500 mr-2"></i> RECIPE MASTER
              </a>
            </div>
            <div class="flex md:hidden">
              <button @click="open = !open" type="button" class="text-white hover:text-yellow-500 focus:outline-none focus:text-yellow-500">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                  <path
                    x-show="!open"
                    class="inline-flex"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M4 6H20V8H4V6ZM4 11H20V13H4V11ZM4 16H20V18H4V16Z"
                  />
                  <path
                    x-show="open"
                    class="inline-flex"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M4 6H20V8H4V6ZM4 11H20V13H4V11ZM4 16H20V18H4V16ZM6 21H18V19H6V21ZM6 3H18V1H6V3Z"
                  />
                </svg>
              </button>
            </div>
            <div class="hidden md:flex items-center space-x-4">
              <div class="flex justify-center">
                  <div
                      x-data="{
                          open: false,
                          toggle() {
                              if (this.open) {
                                  return this.close()
                              }

                              this.$refs.button.focus()

                              this.open = true
                          },
                          close(focusAfter) {
                              if (! this.open) return

                              this.open = false

                              focusAfter && focusAfter.focus()
                          }
                      }"
                      x-on:keydown.escape.prevent.stop="close($refs.button)"
                      x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                      x-id="['dropdown-button']"
                      class="relative"
                  >
                      <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"type="button"
                      class="flex items-center gap-2 px-5 py-2.5 hover:text-yellow-500 shadow text-white">
                          Gestion
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                      </button>

                      <!-- Panel -->
                      <div
                          x-ref="panel"
                          x-show="open"
                          x-transition.origin.top.left
                          x-on:click.outside="close($refs.button)"
                          :id="$id('dropdown-button')"
                          style="display: none;"
                          class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
                      >
                          <div class="px-4 py-2.5 text-left text-gray-600 uppercase text-sm">catégories :</div>
                          <a href="categories/add" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                              Ajouter
                          </a>
                          <a href="categories" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                              Editer/Supprimer
                          </a>
                          <hr>
                          <div class="px-4 py-2.5 text-left text-gray-600 uppercase text-sm">ingrédients :</div>
                          <a href="ingredients/add" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                              Ajouter
                          </a>
                          <a href="ingredients" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                              Editer/Supprimer
                          </a>
                          <hr>
                          <div class="px-4 py-2.5 text-left text-gray-600 uppercase text-sm">recettes :</div>
                          <a href="recipes/add" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                              Ajouter
                          </a>
                          <a href="recipes" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                              Editer/Supprimer
                          </a>
                          <hr>
                          <div class="px-4 py-2.5 text-left text-gray-600 uppercase text-sm">utilisateurs :</div>
                          <a href="users/add" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                              Ajouter
                          </a>
                          <a href="users" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                              Editer/Supprimer
                          </a>
                          <hr>

                      </div>
                  </div>
              </div>
              <a class="text-white hover:text-yellow-500 px-3 py-2" href="users/logout">
                Logout</a
              >
            </div>
          </div>
        </div>
        <div x-show="open" class="md:hidden bg-gray-700">
        <div class="block text-white uppercase px-3 py-2">catégories :</div>
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="categories/add"
            >Ajouter</a
          >
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="categories"
            >Editer/Supprimer</a
          >
          <hr>
          <div class="block text-white uppercase px-3 py-2">ingrédients :</div>
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="ingredients/add"
            >Ajouter</a
          >
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="ingredients"
            >Editer/Supprimer</a
          >
          <hr>
          <div class="block text-white uppercase px-3 py-2">recettes :</div>
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="recipes/add"
            >Ajouter</a
          >
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="recipes"
            >Editer/Supprimer</a
          >
          <hr>
          <div class="block text-white uppercase px-3 py-2">utilisateurs :</div>
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="users/add"
            >Ajouter</a
          >
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="users"
            >Editer/Supprimer</a
          >
          <hr>
          <a class="block text-white hover:text-yellow-500 px-3 py-2" href="users/logout"
            >Logout</a
          >
        </div>
      </nav>
      </div>