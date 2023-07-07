<template>

    <div id="app">
        <h2 style="margin-left:10px ">{{filtred[0].city}}: знайдено {{filtred.length}} помешкань</h2>

        <div class="filter">
            <h3>Ціна за нічь</h3>

            <label>Мінімальна ціна <input type="range" class="range-price" min="0" max="50000" step="100" v-model.number="minPrice" @change="setRange"> {{minPrice}}</label>
            <label>Максимальна ціна <input type="range" min="0" class="range-price" max="50000" step="100" v-model.number="maxPrice" @change="setRange"> {{maxPrice}}</label>
            <label>Кількість зірок</label>
            <input class="stars-count" name="stars" type="number" v-model="stars"  min="0" max="5" @change="isStars()">


        </div>
        <div class="place-card" v-for="(value, index) of filtred" :key="value.objectId">
            <div>
                <a :href="`/place/${value.objectId}`"><img :src='`../../../../storage/${value.photo}`' alt=''></a>
            </div>
            <div>

                <a :href="`/place/${value.objectId}`">{{value.objectName}}
                <div v-if="value.stars == 5">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                </div>
                <div v-if="value.stars == 4">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                </div>
                <div v-if="value.stars == 3">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                </div>
                <div v-if="value.stars == 2">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                </div>
                <div v-if="value.stars == 1">
                    <img style="width: 25px; height: 25px;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/58402.png" alt="">
                </div>
                </a>
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
    data: ()=>
        {
            return {
                elVisible: true,
                minPrice: 0,
                maxPrice: 50000,
                filtred: Array,
                selected: '',
                stars: '',
            }
        },
    props: [
        'object',
        'dates',

    ],
    mounted: function() {
        this.setRange()
    },
    methods: {
        showButton: function (){
            if(this.dates.firstDate !== null && this.dates.endDate !== null){
                this.elVisible = false;
            }
            else {
                this.elVisible = true;
            }
        },
        isStars(){
           if (this.stars != ''){
               this.filterByPrice();
           }
        },
        setRange(){
        if(this.minPrice > this.maxPrice){
            let tmp = this.minPrice
            this.minPrice = this.maxPrice
            this.maxPrice = tmp
        }
        this.filterByPrice()
        },
        filterByPrice(){
            this.filtred = this.object
            this.filtred = this.filtred.filter(item => {
                return item.price >= this.minPrice && item.price <= this.maxPrice
            })
            if(this.stars){
                this.filtred = this.filtred.filter(e => {
                    return e.stars === this.stars
                })
            }

            return this.filtred
        }

     },




}
</script>





