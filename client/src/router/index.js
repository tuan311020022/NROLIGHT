import { createRouter, createWebHistory } from 'vue-router';
// import HeaderPage from '@/components/header/HeaderPage.vue';
import HomeScreen from '../screen/HomeScreen/HomeScreen.vue';
import LoginScreen from '../screen/LoginScreen/LoginScreen.vue';
import SignScreen from '../screen/SignScreen/SignScreen.vue';
import ChangeScreen from '../screen/ChangeScreen/ChangeScreen.vue';
import DonateScreen from '../screen/DonateScreen/DonateScreen.vue';
import CheckScreen from '../screen/CheckScreen/CheckScreen.vue';
import LinkScreen from '@/screen/LinkScreen/LinkScreen.vue';

const routes = [
	{
		path: '/',
		name: 'Home',
		component: HomeScreen
	},
	{
		path: '/Login',
		name: 'Login',
		component: LoginScreen
	},
	{
		path: '/Sign',
		name: 'Sign',
		component: SignScreen
	},
	{
		path: '/Change',
		name: 'Change',
		component: ChangeScreen
	},
	{
		path: '/Donate',
		name: 'Donate',
		component: DonateScreen
	},
	{
		path: '/Check',
		name: 'Check',
		component: CheckScreen
	},
	{
		path: '/Link',
		name: 'Link',
		component: LinkScreen
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;