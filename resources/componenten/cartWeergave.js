app.component('cart-weergave',{
    props:{

    },
    template: `

    <h1 class=" m-2 mt-4">Shopping Cart</h1>
    <section class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
            <div class="card mb-4 br-none ">
                <div class="card-body ">
                    <!--  item -->
                    <div v-for="(product, index) in products" :key="index" >
                    <article class="row" >
                        <div class=" col-4 col-lg-3 mb-4 mb-lg-0">
                            <img v-bind:src="product.image" alt="{{product}}">
                        </div>
                        <div class="col-6 col-lg-5 mb-4 mb-lg-0 fs-li">
                        <p>{{name}}</p>
                            <p class="fs-reg">{{product.title}}</p>
                            <p>{{product.color}}</p>
                        </div>
                        <div class="col-1 order-1 order-lg-2">
                            <button class="btn" type="button"><i class="bi bi-x-circle" @click="removeItem(index)" ></i></button>
                        </div>
                        <div class="col-md-5 col-lg-3 mb-4 mb-lg-0 order-2 order-lg-1 ">
                        <button class="btn  shadow-none" type="button"   @click="qtyDown(index)"><i class="bi bi-arrow-down" ></i></button>
                            <input readonly class="text-center mb-4 border pt-1"  style="max-width: 60px"  :value="product.amount">
                            <button class="btn  shadow-none" type="button" @click="qtyUp(index)"><i class="bi bi-arrow-up  "></i></button>
                            <p class="text-start text-md-center fs-bo"> € {{product.price}}</p>
                            <p class="text-start text-md-center fs-bo">totaal: € {{product.totalPrice}}</p>

                        </div>

                    </article>
                    <hr class="my-4"/>
                    </div>
                    <!--<article class="row">
                        <div class=" col-4 col-lg-3 mb-4 mb-lg-0">
                            <img alt="cart product" src="../assets/images/products/bo_speakers_shape.png"/>
                        </div>
                        <div class="col-6 col-lg-5 mb-4 mb-lg-0 fs-li">
                            <p class="fs-reg">Beosound Shape</p>
                            <p>Color: Purple heart</p>
                        </div>
                        <div class="col-1 order-1 order-lg-2">
                            <i class="bi bi-x-circle"></i>
                        </div>
                        <div class="col-md-5 col-lg-3 mb-4 mb-lg-0 order-2 order-lg-1 ">
                        <button class="btn  shadow-none"><i class="bi bi-arrow-down"></i></button>
                            <input class="text-center mb-4 border pt-1" min="1" style="max-width: 100px" type="number" value="1">
                            <button class="btn shadow-none"><i class="bi bi-arrow-up"></i></button>
                            <p class="text-start text-md-center fs-bo">€ 1,899</p>
                        </div>
                    </article>-->
                   
                    
                    <!--  item -->
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>Expected shipping delivery</strong></p>
                    <p class="mb-0">12.12.2021 - 14.10.2022</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="text-uppercase fs-bo fsize-2 mb-3">Order Total</h2>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 ">
                            Products
                            <p>&#8364; {{totalAmount}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center  px-0">
                            Shipping
                            <p>Free</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 mt-3">
                            <div>
                              Total amount
                              <p class="mb-0">(including VAT)</p>
                            </div>
                            <p>&#8364; {{totalAmount}}</p>
                        </li>
                    </ul>
                    <a href="../checkout.html"><button class="btn btn-outline-dark br-none  " type="button">
                        Go to checkout
                    </button>                    </a>

                </div>
            </div>
        </div>
    </section>
`,

    data(){
        return{
            merk:'Bang & Olufsen',
            totalAmount: 0,
            cart: [],
            products:[
                {
                    soortId:1,
                    title: 'Beoplay A9 4th Gen',
                    color: "Black",
                    image: "../assets/images/products/bo_speakers_a94.png",
                    price: 2699,
                    amount: 1,
                    totalPrice: 2699,
                },
                {
                    soortId:2,
                    title: 'Beosound Shape',
                    color: "Purple heart",
                    image: "../assets/images/products/bo_speakers_shape.png",
                    price: 1899,
                    amount: 1,
                    totalPrice: 1899,
                },
            ],

        }
    },
    mounted:function (){
        this.totalAmountCalc();
        //this.total();
    },
    methods:{
        totalAmountCalc(){
            for(var i=0; i< this.products.length; i++){
                this.totalAmount += this.products[i].price;
            }

        },
        /*total(){
            for(let i =0; i< this.products.length;i++){
                if(i<1){
                    this.totalAmount =  this.products[i].totalPrice;
                }
                else if(i<=0){
                    this.totalAmount = 0;
                }
                else{

                        this.totalAmount = this.totalAmount + this.products[i].price;

                }


            }
        },*/
        removeItem(index) {
            this.products.splice(index, 1);
            this.totalAmount = 0
            for(let i=0; i< this.products.length; i++){
                this.totalAmount +=  this.products[i].totalPrice;
            }

        },


        qtyUp(index){
            this.products[index].amount = this.products[index].amount + 1;
            //this.products[index].totalPrice =  this.products[index].amount * this.products[index].price;
            this.products[index].totalPrice = this.products[index].totalPrice + this.products[index].price
            this.totalAmount = 0
            for(let i=0; i< this.products.length; i++){
                this.totalAmount += this.products[i].totalPrice;
            }
        },

        qtyDown(index){
            if(this.products[index].amount === 1) {
                this.removeItem(index);
                //this.totalAmount = this.totalAmount - this.products[index].totalPrice;

            } else {
                this.products[index].amount = this.products[index].amount - 1;
                //this.products[index].totalPrice =  this.products[index].amount * this.products[index].price;
                this.products[index].totalPrice =  this.products[index].totalPrice - this.products[index].price
                this.totalAmount = 0

                for(let i=0; i< this.products.length; i++){
                    this.totalAmount += this.products[i].totalPrice;
                }
            }
        },


    },
    computed:{
        name(){
            //return this.product + ' ' + this.merk
           // return `${this.products[1].title} ${this.merk}`
        },
        /*total(){
            for(let i =0; i< this.products.length;i++){
                if(i<1){
                    this.totalAmount =  this.products[i].totalPrice;
                }
                else if(i<=0){
                    this.totalAmount = 0;
                }
                else{

                    this.totalAmount = this.totalAmount + this.products[i].price;

                }


            }
        },*/




    }
})