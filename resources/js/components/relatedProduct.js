import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class RelatedProduct extends Component {
    render() { 
        return ( 
        <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
            <h2 className="pt-4 pb-5 display-4">Similar items</h2>
            <div className="row">
                {this.props.relatedProducts.map(product => (
                        <div key={product.id} className="col-4">
                            <div className="card border-0 rounded-0">
                                <Link to={"/"}>
                                    <img
                                    src={product.img}
                                    className="card-img-top rounded-0"
                                    alt={product.img}
                                    onClick={(e)=> this.props.targetProduct(product)} />
                                </Link>
                                <div className="card-body">
                                    <div className="row">
                                        <div className="col-12">
                                            <h1 className="card-title h2">{product.name}</h1>
                                            <h4 className="text-success font-weight-bolder">${product.price}</h4>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-6 pt-2">
                                            <small className="text-warning h6">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
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
 
export default RelatedProduct;