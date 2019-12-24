import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

import RelatedProduct from './relatedProduct'

const similarProducts = [
    {
        id: 1,
        name: 'product 1',
        price: 100,
        img: "images/product-blue.png"
    },
    {
        id: 2,
        name: 'product 2',
        price: 55,
        img: "images/product-cyan.png"
    },
    {
        id: 3,
        name: 'product 3',
        price: 150,
        img: "images/prodect-tblue.png"
    },
    {
        id: 4,
        name: 'product 4',
        price: 244,
        img: "images/product-red.png"
    },
    {
        id: 5,
        name: 'product 5',
        price: 755,
        img: "images/prodect-tdark.png"
    },
    {
        id: 6,
        name: 'product 6',
        price: 814,
        img: "images/product-joy.png"
    }

]


class FullProductCard extends Component {
    render() {
        const { id, name, price, photo } = this.props.target;

        return (
            <div>
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card border-0 rounded-0">
                            <div className="row no-gutters">
                                <div className="col-md-6">
                                    <img src={photo.path} className="card-img rounded-0" alt={photo.path} />
                                </div>
                                <div className="col-md-6">
                                    <div className="card-body">
                                        <h5 className="card-title">{name}</h5>
                                        <p className="card-text h3 font-weight-bold mb-4">Amazon Brand - Peak Velocity Men's VXE Cloud Run Short Sleeve Quick-Dry Athletic-Fit T-Shirt</p>
                                        <p className="card-text mb-2 h4">price: <span className="font-weight-bolder text-success">${price}</span></p>
                                        <p className="card-text mb-2 h4">size: <span>large</span></p>
                                        <p className="card-text mb-2 h4">color: <span>red</span></p>
                                        <div className="row">
                                            <div className="col-6 pt-2">
                                                <small className="text-warning h6">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                            </div>
                                            <div className="col-6">
                                                <a href="#" 
                                                className={"btn btn-"+ 
                                                (this.props.added && id === this.props.btnId?
                                                "success animated heartBeat" : "primary")}
                                                onClick={(e)=>{
                                                    e.preventDefault();
                                                    this.props.addToCart(this.props.target)
                                                }}>
                                                    <i className="fa fa-shopping-cart"></i><span className="px-2">Add to Card</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <RelatedProduct
            relatedProducts={similarProducts}
            />
            </div>
         );
    }
}
 
export default FullProductCard;