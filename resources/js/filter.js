import moment from 'moment';
import Vue from 'vue';
Vue.filter('dateformate',(arg)=>{
    return   moment(arg).format("DD-MM-YYYY");
})
