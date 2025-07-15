<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class VariantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $isRouteShow = str_contains(Route::currentRouteName(), 'variants.show');

        return [
            'id' => $this->id,
            'title' => $this->title,
            'date' => $this->created_at->format('d.m.Y'),
            'file_path' => $this->when($isRouteShow, $this->file_path),
        ];
    }
}
// "created_at": "2025-07-09T16:49:51.000000Z",
// Супер! Есть такой код всего компонента
// <script setup lang="ts">

// import PageTitle from '../../ui/PageTitle.vue';
// import VariantsList from '../../components/admin/VariantsList.vue';
// import { api } from '../../api/api';
// import { onMounted, ref } from 'vue';
// import ModalWin from '../../ui/ModalWin.vue';
// import VariantForm from '../../components/forms/VariantForm.vue';

// const variants = ref([]);

// const indexVariant = async () => {

//     try {
//         const response = await api.get(`/api/v1/admin/variants`);

//         variants.value = response.data;
//     } catch(err) {
//         console.error(err);
//     }
// }

// onMounted(async () => {
//     await indexVariant();
//     console.log("MAIN", variants.value);
// });

// </script>

// <template>
//     <div class="variants">

//         <PageTitle title="Варианты"/>

//         <ModalWin 
//             modal-title="Добавление варианта"
//             modal-btn="Добавить вариант"
//             :form="VariantForm"
//         />

//         <div class="tags__wrapper">
//             <VariantsList :variants="variants.data"/>
//         </div> 

//     </div>
// </template>


// Как прям хорошо передать ref в VariantsList? 
