import React, { Component } from 'react';
import {Link, withRouter} from "react-router-dom";

class AddProduct extends Component {

        constructor() {
        super();
        this.state = {
            name: '',
            price: '',
            desc: '',
            category: '',
        }

        this.changehandel = this.changehandel.bind(this);
        this.adminhandle = this.adminhandle.bind(this);
    }

    changehandel(event) {
        const fieldValue = event.target.name;
        this.setState({
            [fieldValue]: event.target.value
        })
    }

    adminhandle(event) {
        event.preventDefault();
        const fetchData = {
            name: this.state.name,
            price: this.state.price,
            desc: this.state.desc,
            category: this.state.category
        };
        
        fetch(`/dashboard/product`, {
            method: 'POST',
            body: JSON.stringify(fetchData),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            }
        }).then(res => {
                res.json();
                if(res) {
                    this.props.add_prduct(fetchData);
                    this.props.history.push('/dashboard/product');
                }
            })//.then(data => console.log(data))
            .catch(err => console.error("Error:", err));
}

    render() {
        return(
            <div className="card">
                <div className="card-header h2">Create New Product</div>
                    <div className="card-body">
                        <form method="post">
                        <div className="form-group">
                                <label htmlFor="exampleInputPassword1">Category</label>
                                <select className="form-control">
                                    <optgroup label="This is a group">
                                        <option value="12" selected>This is item 1</option>
                                        <option value="13">This is item 2</option>
                                        <option value="14">This is item 3</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div className="form-group">
                                <label htmlFor="address">Category</label>
                                <input 
                                type="text" 
                                className="form-control" 
                                id="" aria-describedby="" 
                                name="category" 
                                value={this.state.fieldValue}
                                onChange={this.changehandel}
                                />
                            </div>
                            <div className="form-group">
                                <label htmlFor="name">Name</label>
                                <input 
                                type="text" 
                                className="form-control" 
                                id="name"
                                name="name"
                                value={this.state.name}
                                onChange={this.changehandel}
                                />
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputPrice">Price</label>
                                <input 
                                type="number" 
                                className="form-control" 
                                id="" 
                                name="price"
                                value={this.state.price}
                                onChange={this.changehandel}
                                />
                            </div>
                            <div className="form-group">
                                <label htmlFor="desc">description</label>
                                <textarea 
                                type="text" 
                                className="form-control" 
                                id="desc" 
                                col="18"
                                name="desc"
                                value={this.state.desc}
                                onChange={this.changehandel}
                                ></textarea>
                            </div>
                            <div className="form-group">
                                <button className="btn btn-success btn-block" type="submit">Add Product</button>
                            </div>
                        </form>
                    </div>
            </div>
        );
    }
}
 
export default withRouter(AddProduct);