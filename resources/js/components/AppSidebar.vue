<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookOpen, Check, Folder, LayoutGrid, List, User ,BookUser,Users  } from 'lucide-vue-next';
import { DollarSign,ContactRound,ShoppingCart,HandCoins,Car     } from 'lucide-vue-next';

import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Ingresos',
        href: route('ingreso.index'),
        icon: DollarSign,
    },
    {
        title: 'Compras',
        href: route('compra.index'),
        icon: ShoppingCart,
    },
    {
        title: 'Gastos',
        href: route('gasto.index'),
        icon: HandCoins,
    },
    {
        title: 'Planillas',
        href: route('planilla.index'),
        icon: User,
    },
    {
        title: 'Proveedores',
        href: route('proveedor.index'),
        icon: ContactRound,
    },
    {
        title: 'Empleados',
        href: route('empleado.index'),
        icon: Users  ,
    },

    {
        title: 'Autos',
        href: route('auto.index'),
        icon: Car,
    },
];

const footerNavItems: NavItem[] = [

];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
