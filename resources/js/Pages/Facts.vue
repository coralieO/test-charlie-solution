<template>
<AppLayout>

    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All FACTS
            </h2>
    </template>
    <!-- component -->
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />

<!-- ====== Cards Section Start -->
<section class="pt-20 lg:pt-[120px] pb-10 lg:pb-20 bg-[#F3F4F6]">
   <div class="container">
      <div class="flex flex-wrap -mx-4">
         <div class="w-full md:w-1/2 xl:w-1/3 px-4">
            <div class="bg-white rounded-lg overflow-hidden mb-10" v-for="fact in facts" :key="fact.id">
               <img
                  src="https://images.unsplash.com/photo-1437957146754-f6377debe171?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y2hpZW58ZW58MHx8MHx8&auto=format&fit=crop&w=500"
                  alt="image"
                  class="w-full"
                  />
               <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center"  >
                  <h3>
                     <a
                        href="javascript:void(0)"
                        class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        "
                        >
                     Fact {{fact.id}} about dogs
                     </a>
                  </h3>
                  <p class="text-base text-body-color leading-relaxed mb-7">
                    {{fact.Facts}}
                  </p>
                  <a
                     :href="route('fact.show', fact.id)" :active="route().current('fact.show')"
                     class="
                     inline-block
                     py-2
                     px-7
                     border border-[#E5E7EB]
                     rounded-full
                     text-base text-body-color
                     font-medium
                     hover:border-primary hover:bg-primary hover:text-white
                     transition
                     "
                     >
                  View Details
                  </a>
               </div>
            </div>
            </div>
            </div>
        </div>


</section>




</AppLayout >

</template>
<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'



    export default defineComponent({
        props: ['facts'],
        components: {
            AppLayout,
        },
        methods:{
        destroy(id){
        if(confirm("Do you really want to delete?")){

        this.$inertia.delete(this.route('fact.delete',`${id}` ))}
            }
            }
    })
</script>

