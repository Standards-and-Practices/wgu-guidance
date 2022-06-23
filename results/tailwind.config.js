const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
	theme: {
		colors: {
			darkBlue: { 100: '#003057', 200: '#8097ab'},
			id: { 100: '#c69214', 200: '#E2C889'},
			lightBlue: { 100: '#327da9', 200: '#98BED4'},
			assess: { 100: '#42892e', 200: '#A0C496'},
			acc: { 100: '#e66e24', 200: '#F2B691'},
			accentyellow: { 100: '#f6be00', 200: '#FADE80'},
			dei: { 100: '#840028', 200: '#C18093'},
			accentpurple: { 100: '#7c235e', 200: '#BD91AE'},
			lightgray: { 100: '#e0e0e0', 200: '#EFEFEF'},
			it: { 100: '#63666a', 200: '#B1B2B4'},
			darkgray: { 100: '#404048', 200: '#9F9FA3'},
			vd: { 100: '#49b1b3', 200: '#A4D8D9'},
			sel: { 100: '#f79843', 200: '#FBCBA1'},
			pd: { 100: '#6a5acd', 200: '#B4ACE6'},
		},
		fontFamily: {
			'display': ['Open Sans'],
			'body': ['Open Sans'],
		},
	},
	plugins: [
		require('@tailwindcss/forms'), 
		require('@tailwindcss/typography'), 
		require('@tailwindcss/line-clamp'), 
		require('@tailwindcss/aspect-ratio')
	],
};
