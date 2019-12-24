import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class Categories extends Component {
    constructor() {
        super();
        this.state = {
            categories: []
        }
    }

    componentDidMount() {
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
    }
    
    render() { 
        return (
            <ul className="nav nav-pills nav-fill bg-secondary h4 m-0">
            {this.state.categories.map(category=>(
                <li key={category.id} className="nav-item py-2 category">
                    <Link to="/">
                        <span className="nav-link text-dark pointer font-weight-bolder">{category.name}</span>
                    </Link>
                </li>
            ))}
            </ul>
         );
    }
}
 
export default Categories;