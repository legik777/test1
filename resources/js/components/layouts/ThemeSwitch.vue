<template>
<div class="theme-info inline-flex justify-start items-center  w-8 h-14 ml-10 mr-10 mt-3">
	<input type="checkbox" id="themeSwitch" name="theme-switch" @change="changeTheme()" v-model="this.themeStatus" class="theme-switch__input w-20 h-14" />
	<label for="themeSwitch" class="theme-switch__label">
		<span></span>
        <div></div>
	</label>
</div>
</template>

<script>
import { usePersonStore } from "../../stores/PersonStore"
import { mapWritableState } from "pinia";
    export default {
        name:'ThemeSwitch',
        data() {
            return {
                // theme: null,
                themeStatus:false,
            }
        },
        computed:{
            ...mapWritableState(usePersonStore,['theme'])
        },
        mounted() {
            this.themeTest = 'testData';
        if (localStorage.theme ==='dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) ) {
            this.theme = 'dark';
            this.themeStatus = true;
        } else {
            this.theme = 'light';
            this.themeStatus = false;
        }
    },
    watch: {
        theme(newTheme) {
            localStorage.theme = newTheme;
            this.personStore.setTheme(newTheme)
        },
/*         themeTest(newThemeTest){
            console.log('themeTest',newThemeTest);
        } */
    },
        methods: {
            changeTheme() {
                this.theme = this.themeStatus ? 'dark'  : 'light';
            }
        },
        setup() {
        const personStore = usePersonStore();
        return { personStore };
    },
    }
</script>

<style scoped>

/*  .theme-switch__input:checked ~ main {
	 --gradDark: #102128;
	 --gradLight: #2d5567;
} */
.theme-info{
    user-select: none;
    /* margin-right: 60px; */
    cursor: pointer;
    position: relative;
    /* width: 2rem; */

}
 .theme-switch__input, .theme-switch__label {
	 position: absolute;
	 z-index: 1;
     cursor: pointer;
}


 .theme-switch__input {
	 opacity: 0;
}
 .theme-switch__input:hover + .theme-switch__label, .theme-switch__input:focus + .theme-switch__label {
	 background-color: lightSlateGray;
}
 .theme-switch__input:hover + .theme-switch__label div::after, .theme-switch__input:focus + .theme-switch__label div::after {
	 background-color: #d4ebf2;
}
 .theme-switch__label {
	 transition: background-color 200ms ease-in-out;
	 width: 32px;
	 height: 12px;
	 border-radius: 50px;
	 text-align: center;
	 background-color: slateGray;
	 box-shadow: -4px 4px 15px inset rgba(0, 0, 0, 0.4);
}
 .theme-switch__label::before, .theme-switch__label::after {
	 font-size: 2rem;
	 position: absolute;
	 transform: translate3d(0, -50%, 0);
}
 .theme-switch__label::before {
	 content: '\263C';
	 right: 100%;
	 margin-right: 10px;
	 color: orange;
}
 .theme-switch__label::after {
	 content: '\263E';
	 left: 100%;
	 margin-left: 10px;
	 color: lightSlateGray;
}
 .theme-switch__label div {
	 position: absolute;
	 bottom: calc(100% + 10px);
	 left: 0;
	 width: 100%;
}
 .theme-switch__label div::after {
	 position: absolute;
	 top: calc(100% + 8px);
	 left: 0px;
	 width: 15px;
	 height: 15px;
	 content: '';
	 border-radius: 50%;
	 background-color: lightBlue;
	 transition: transform 200ms, background-color 200ms;
	 box-shadow: -3px 3px 8px rgba(0, 0, 0, 0.4);
}
 .theme-switch__input:checked ~ .theme-switch__label {
	 background-color: lightSlateGray;
}
 .theme-switch__input:checked ~ .theme-switch__label::before {
	 color: lightSlateGray;
}
 .theme-switch__input:checked ~ .theme-switch__label::after {
	 color: turquoise;
}
 .theme-switch__input:checked ~ .theme-switch__label div::after {
	 transform: translate3d(17px, 0, 0);
}



</style>
