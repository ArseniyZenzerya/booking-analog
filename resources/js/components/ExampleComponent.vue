<template>
    <div id="app">
    <div class="place-card" v-for="value in object">
        <div>
            <a :href="`/place/${value.objectId}`"><img :src='`../../../../storage/${value.photo}`' alt=''></a>
        </div>
        <div>

            <a :href="`/place/${value.objectId}`">{{value.objectName}}</a>
            <p>{{value.address}}</p>
            <div>
                <p>{{value.description}}</p>
                <p>БЕЗКОШТОВНЕ скасування бронювання! • Передплата не потрібна</p>
                <p>Ви зможете скасувати бронювання пізніше, тож зафіксуйте сьогодні відмінну ціну.</p>
            </div>
        </div>
        <div>
            <div>
                <a href="">
                    <div>
<!--                        v-for="feed in feedbacks.filter(function (item){-->
<!--                        return item['objectId'] === value.objectId;-->
<!--                        })"-->
                        <h3>

                        </h3>
<!--                        <p>{{count($feedbacks)}} відгук</p>-->
                    </div>
                </a>
                <a href="">
                    <div>
<!--                        <p>{{$averagePoint}}</p>-->
                    </div>
                </a>
            </div>
            <p>1 ніч, {{value.countGuest}} дорослих</p>
            <h4>{{value.price}}UAH</h4>
            <p>Включає податки та збори</p>

            <a :href="`/place/${value.objectId}`" v-if="elVisible"><div><p>Переглянути ціни</p></div></a>
            <a href="#dates" v-else><div><p>Переглянути наявність місць</p></div></a>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    data: ()=>{
        return{
            elVisible: true,
            personal: Array,
            convenient: Array,
            clear: Array,
            comfortable: Array,
            priceQuality: Array,
            area: Array,

        }
    },
    props: [
        'object',
        'dates',
        'feedbacks'

    ],
    mounted() {
        this.update()
    },
    methods: {
        update: function(){
            console.log(this.feedbacks);
        },
        showButton: function (){
            if(this.dates.firstDate !== null && dates.endDate !== null){
                this.elVisible = true;
            }
            else {
                this.elVisible = false;
            }
        },
        // feedbackSort: function ($Obj) {
        //     console.table(this.feedbacks)
        //
        //     this.feedbacks = this.feedbacks.filter(function (item){
        //      return item['objectId'] === $Obj;
        //     })
        //
        //     console.table(this.feedbacks)
        // }

    },


}
</script>
