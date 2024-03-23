import { createWebHistory, createRouter } from "vue-router";
import CreateSeller from "@/components/CreateSeller.vue";
import CreateSale from "@/components/CreateSale.vue";
import ListSellers from "@/components/ListSellers.vue";
import ListSalesSeller from "@/components/ListSalesSeller.vue";

const routes = [
    {
        path: "/create-seller",
        name: "Criar Vendedor",
        component: CreateSeller,
    },
    {
        path: "/list-sellers",
        name: "Listar Vendedores",
        component: ListSellers,
    },
    {
        path: "/create-sale",
        name: "Criar Venda",
        component: CreateSale,
    },
    {
        path: "/list-sales-seller",
        name: "Listar Vendas do Vendedor",
        component: ListSalesSeller
    }
    
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
