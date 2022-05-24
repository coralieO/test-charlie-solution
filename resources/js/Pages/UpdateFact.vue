<template>
<AppLayout>

    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                UPDATE FACT
            </h2>
    </template>
        <div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
                <div class="mb-6">
                    <h1 class="block mb-2 text-sm text-dark-600 dark:text-dark-400">My new fact</h1>

            </div>
            <div class="m-7">
               <form @submit.prevent="submit">

                    <div class="mb-6">
                        <label for="Facts" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Fact</label>
                        <textarea id="Facts" v-model="form.Facts" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" ></textarea>
                    <div v-if="errors.Facts">{{errors.Facts}}</div>
                    <jet-input-error :message="errors.Fact" class="mt-2" />
                    </div>
                    <div class="p-2 flex justify-end rounded-b">
                      <button type="submit" class="w-full px-3 py-4 text-black bg-white-100 rounded-md focus:bg-indigo-300 border-2 focus:outline-none"> <a href="/Facts"> Annuler</a></button>
                        <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Sauvegarder</button>
                    </div>
                    <p class="text-base text-center text-gray-400" id="result">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>



</AppLayout >

</template>

<script>

import AppLayout from '../Layouts/AppLayout'
import JetInputError from '../Jetstream/InputError'
export default {

  data() {
    return {
      form: this.$inertia.form({
        Facts: this.facts.Facts
      })
    }
  },
 components: {
        AppLayout,
        JetInputError
    },
 props:['errors','facts'],
  methods: {

    submit() {

      this.$inertia.put(this.route('fact.update', this.facts.id), this.form);
    },
  },

}

</script>
