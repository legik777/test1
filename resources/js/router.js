import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "main",
        component: () => import("./components/Main.vue"),
    },
    {
        path: "/equipment/:id",
        name: "equipment.show",
        component: () => import("./components/ShowEquipment.vue"),
    },
    {
        path: "/equipment/create",
        name: "equipment.create",
        component: () => import("./components/CreateEquipment.vue"),
    },
    {
        path: "/equipment/edit/:id",
        name: "equipment.edit",
        component: () => import("./components/EditEquipment.vue"),
    },
    {
        path: "/equipment-type",
        name: "equipment.type",
        component: () => import("./components/EquipmentType.vue"),
    },





    {
        path: "/login",
        name: "user.login",
        component: () => import("./components/login/Login.vue"),
    },
    {
        path: "/register",
        name: "user.register",
        component: () => import("./components/login/Registration.vue"),
    },
    {
        path: "/error",
        name: "error",
        component: () => import("./components/Error404.vue"),
    },
    {
        path: "/:pathMatch(.*)*",
        name: "not-found",
        component: () => import("./components/Error404.vue"),
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
router.beforeEach((to, from, next) => {
    // const accessToken = localStorage.getItem('x_xsrf_token')
    next();
});

export default router;
