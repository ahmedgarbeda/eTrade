import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";


class ProductCard extends Component {
    render() { 
        const categories = {
            "home": 1,
            "mobile": 2,
            "supermarket": 3,
            "toys": 4
        }


        return (               
                <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                    <h2 className="pt-4 pb-5 display-4">Discover eTrade</h2>
                    <div className="row">
                    {this.props.products.map(product => (
                        <div key={product.id} className="col-4">
                            <div className="card border-0 rounded-0">
                                <div className="position-relative">
                                <span className="position-absolute cate-badge py-1 px-2 font-weight-bolder">
                                    {
                                        product.category_id===categories.home?<span>Home</span>:
                                        product.category_id===categories.mobile?<span>Mobiles & Tablets</span>:
                                        product.category_id===categories.supermarket?<span>Supermarket</span>:<span>Toys</span>
                                    }
                            </span>
                                    <Link to={"/product"}>
                                        <img
                                        src={product.photo.path}
                                        className="card-img-top rounded-0"
                                        alt={product.img}
                                        onClick={(e)=> this.props.targetProduct(product)} />
                                    </Link>
                                </div>
                                <div className="card-body">
                                    <div className="row">
                                        <div className="col-12">
                                            <h1 className="card-title h2">{product.name}</h1>
                                            <h4 className="text-success font-weight-bolder">${product.price}</h4>
                                        </div>
                                        <div className="col-6">
                                            
                                        </div>
                                    </div>
                                    <p className="card-text">{product.description}</p>
                                    <div className="row">
                                        <div className="col-6 pt-2">
                                            <small className="text-warning h6">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <div className="col-6">
                                            <a href="#"
                                            className={"btn btn-"+ 
                                            (this.props.added && product.id === this.props.btnId?
                                             "success animated heartBeat" : "primary")}
                                            onClick={(e) =>
                                                    {e.preventDefault();
                                                    this.props.addToCart(product)}
                                                    }>
                                                <i className="fa fa-shopping-cart"></i><span className="px-2">Add to Card</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                    </div>
                </div>
         );
    }
}
 
export default ProductCard;