import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {BrowserRouter as Router, Switch, Route, Redirect} from "react-router-dom";

import '../style/style.css';

import ScrollToTop from './scrollToTop';
import Navbar from './nav.js';
import Header from './header.js';
import Categories from './categories';
import Login from './login';
import Signup from './signup';
import CartTable from './cartTable';
import CartList from './cartList';
import TotalPrice from './totalPrice';
import Payments from './payments';
import OrderDone from './onTheWay';
import ProductCard from './productCard.js';
import FullProductCard from './fullProductCard.js';
import Aboutus from './aboutus.js';
import Footer from './footer.js';


const fetchedProducts = [
    {
        id: 1,
        name: 'product 1',
        price: 100,
        img: "images/product-joy.png",
        catID: 1
    },
    {
        id: 2,
        name: 'product 2',
        price: 55,
        img: "images/product-blue.png",
        catID: 2
    },
    {
        id: 3,
        name: 'product 3',
        price: 150,
        img: "images/product-red.png",
        catID: 3
    },
    {
        id: 4,
        name: 'product 4',
        price: 244,
        img: "images/product-cyan.png",
        catID: 3
    },
    {
        id: 5,
        name: 'product 5',
        price: 755,
        img: "images/prodect-tdark.png",
        catID: 4
    },
    {
        id: 6,
        name: 'product 6',
        price: 814,
        img: "images/prodect-tblue.png",
        catID: 2
    }

]


class App extends Component {

    constructor() {
        super();
        this.state = {
            categories: [],
            productList: [],
            cartList: [],
            cartCount: 0,
            addToCartAnimate: {animateState: false, btnId: 0},
            targetProduct: null,
            isProductListEmpty: false,
            subTotal: 0,
            userToken: '',
            isLogging: false,
            waitingTime: false,
            loggingUser: '',
            errorState: false,
            errorMessage: ''
        }
        //this.selectedCategory = this.selectedCategory.bind(this);
        this.caluculateSubTotal = this.caluculateSubTotal.bind(this);
        this.targetProduct = this.targetProduct.bind(this);
        this.addToCart = this.addToCart.bind(this);
        this.deleteFromCart = this.deleteFromCart.bind(this);
        this.register = this.register.bind(this);
        this.login = this.login.bind(this);
        this.logOut = this.logOut.bind(this);
    }

    // selectedCategory(orderBy) {
    //     let orderKey = orderBy.id;

    //     this.setState(current=>({
    //         productList: current.productList.filter(p => {
    //             return p.category_id == orderKey
    //         })
    //     }))
    // }
    

    caluculateSubTotal(price) {
        this.setState({ subTotal: this.state.subTotal + Number(price) });
    }

    addToCart(product) {
        let tmpProduct = this.state.cartList;
        let tmpCount = this.state.cartCount;
        let tmpBtnId = this.state.addToCartAnimate.btnId;

        if(tmpProduct.includes(product)) {
            return 
        } else {
            tmpProduct.push(product);
            this.setState({
                cartList: tmpProduct,
                cartCount: tmpCount + 1,
                addToCartAnimate: {animateState: true, btnId: product.id}
            })
        }
    }

    deleteFromCart(product) {
        let tmpCount = this.state.cartCount;

        this.setState(current=>({
            cartList: current.cartList.filter(c => {
                return c.id !== product.id
            }),
            cartCount: tmpCount - 1,
            subTotal: 0,
            addToCartAnimate: {animateState: false, btnId: product.id}
        }))
    }

    targetProduct(product) {
        this.setState({
            targetProduct: product
        });
    }

    async register(data) {
        this.setState({
            waitingTime: !this.state.waitingTime
        });
        const res = await fetch("/api/register", {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                }
            });
            const dataPayload = await res.json();
            try {
                this.setState({ 
                    userToken: dataPayload.token,
                    isLogging: !this.state.isLogging,
                    loggingUser: dataPayload.user.username
                });
            } catch {
                err => console.error("Error:", err);
            }
    }

    async login(data) {
        this.setState({
            waitingTime: !this.state.waitingTime,
            errorState: false,
            errorMessage: ''
        });
        const res = await fetch("/api/login", {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                }
            });
            const dataPayload_token = await res.json();
            try {
                // console.log(dataPayload_token.token);
                sessionStorage.setItem("access_token", dataPayload_token.token);
                let key = sessionStorage.getItem('access_token');
                if(key==='') {
                    this.setState({
                        waitingTime: !this.state.waitingTime,
                        errorState: !this.state.errorState,
                        errorMessage: 'invalid email or password'
                    })
                }else {
                    this.setState({
                        userToken: dataPayload_token.token,
                        isLogging: !this.state.isLogging
                    });
                }
            } catch {
                err => console.error("Error:", err);
            } 
    }

    logOut() {
        this.setState({ 
            userToken: '',
            isLogging: !this.state.isLogging,
            waitingTime: false,
            loggingUser: ''
        });
        sessionStorage.clear();
    }

    getCategories() {
        return (
            fetch("api/productmodule/category")
            .then(req => req.json())
            .then(res => {
                const categories = res.data.map(category=> {
                    return category
                });
                this.setState({
                    categories: categories
                });
            })
        );
    }

    getProducts() {
        return (
            fetch("api/productmodule/product")
            .then(req => req.json())
            .then(res => {
                const products = res.data.map(product=> {
                    return product
                });
                this.setState({
                    productList: products
                });
            })
        );
    }

    async componentDidMount() {
        // sessionStorage.clear();
        let key = sessionStorage.getItem('access_token');
        sessionStorage.setItem("access_token", this.state.userToken);
        
        if(key) {
            this.setState({
                isLogging: !this.state.isLogging
            })
        }

        await this.getCategories();
        await this.getProducts();
    }

    render() {
        //(window.scrollY?window.scroll(0, 0):"");

        const products = this.state.cartList.map(product => {
            return (
                <CartList 
                id={product.id}
                name={product.name}
                price={product.price}
                img={product.img}
                handleTotal={this.caluculateSubTotal}
                deleteFromCart={this.deleteFromCart}
                />
            );
        });

        const EmptyList = () =><div className="text-center text-primary display-4 py-4 w-100">Your Cart is Empty</div>;
        
        return (
            <Router>
                {(this.state.isLogging?<Redirect to="/"/>:'')}
                <ScrollToTop />
                <Navbar 
                isLogging={this.state.isLogging}
                username={this.state.loggingUser}
                logOut={this.logOut}
                count={this.state.cartCount} />
                <Header />
                <Categories 
                categories={this.state.categories}
                selectedCategory={this.selectedCategory}
                />
                    <div className="container">
                        <Switch>
                            <Route exact path="/">
                                <ProductCard 
                                products={this.state.productList}
                                addToCart={this.addToCart}
                                added={this.state.addToCartAnimate.animateState}
                                btnId={this.state.addToCartAnimate.btnId}
                                targetProduct={this.targetProduct}
                                />
                            </Route>
                            <Route path="/product">
                                <FullProductCard
                                target={this.state.targetProduct}
                                addToCart={this.addToCart}
                                added={this.state.addToCartAnimate.animateState}
                                btnId={this.state.addToCartAnimate.btnId}
                                />
                            </Route>
                            <Route path="/sign-up">
                                <Signup addUser={this.register} waitingTime={this.state.waitingTime} />
                            </Route>
                            <Route path="/login">
                                <Login 
                                logUser={this.login} 
                                waitingTime={this.state.waitingTime}
                                errorState={this.state.errorState}
                                errorMessage={this.state.errorMessage}
                                />
                            </Route>
                            <Route path="/cart">
                                <CartTable 
                                show={
                                        (this.state.cartList.length===0)? <EmptyList /> : products
                                     }
                                empty={this.state.isProductListEmpty}
                                gotTotal={<TotalPrice subTotalValue={this.state.subTotal}/>} />
                            </Route>
                            <Route path="/payments">
                                <Payments />
                            </Route>
                            <Route path="/about-us">
                                <Aboutus />
                            </Route>
                            <Route path="/onTheWay">
                                <OrderDone />
                            </Route>
                        </Switch>
                    </div>
                <Footer />
            </Router>
        );
    }
}

export default App;

