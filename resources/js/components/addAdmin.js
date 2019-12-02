import React, { Component } from 'react';
import {Link} from "react-router-dom";


class AddAdmin extends Component {

    constructor() {
        super();
        this.state = {
            "admin[name]": '',
            "admin[email]": '',
            "admin[passwors]": '',
            "admin[address]": '',
        }

        this.changehandel = this.changehandel.bind(this);
        this.adminhandle = this.adminhandle.bind(this);
    }

    changehandel(event) {
        const name = event.target.name;
        this.setState({
            [name]: event.target.value
        })
    }
    
    adminhandle(event) {
        event.preventDefault();
        
        console.log(this.state);

        fetch(`/dashboard/admin`, {
            method: 'POST',
            body: JSON.stringify(this.state),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            }
        }).then(res => res.json())
            .then(data => console.log(data))
            .catch(err => console.error("Error:", err));
    }

    render() {
        return( 
            <div className="card">
                <div className="card-header h2">Create New admin</div>
                    <div className="card-body">
                        <form id="myForm" onSubmit={this.adminhandle}>
                            <div className="form-group">
                                <label htmlFor="name" readOnly>Name</label>
                                <input 
                                type="text" 
                                className="form-control" 
                                id="admin[name]" aria-describedby="" 
                                name="admin[name]"
                                value={this.state.name}
                                onChange={this.changehandel}
                                />
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputEmail1">Email address</label>
                                <input 
                                type="email" 
                                className="form-control" 
                                id="admin[email]" 
                                aria-describedby="emailHelp" 
                                name="admin[email]"
                                value={this.state.email}
                                onChange={this.changehandel} 
                                />
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputPassword1">Password</label>
                                <input 
                                type="password" 
                                className="form-control" 
                                id="admin[password]" 
                                name="admin[password]" 
                                value={this.state.password}
                                onChange={this.changehandel}
                                />
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputPassword1">Password (repeat)</label>
                                <input
                                type="password" 
                                className="form-control" 
                                id="admin[repassword]" 
                                name="admin[repassword]" 
                                value={this.state.password}
                                onChange={this.changehandel}
                                />
                            </div>
                            {/* <div className="form-group">
                                <label htmlFor="address">address</label>
                                <input 
                                type="text" 
                                className="form-control" 
                                id="admin[address]" aria-describedby="" 
                                name="admin[address]" 
                                value={this.state.address}
                                onChange={this.changehandel}
                                />
                            </div> */}
                            <div className="form-group">
                                <label htmlFor="exampleInputPassword1">Roles</label>
                                <button aria-expanded="false" className="btn btn-lg dropdown-toggle text-black-50 w-100 m-0 border roles" data-toggle="dropdown" type="button">choose one</button>
                                <div className="dropdown-menu text-center bg-light" role="menu">
                                    <span className="dropdown-item" href="#" role="presentation">First Product</span>
                                    <span className="dropdown-item" href="#" role="presentation">Second Product</span>
                                    <span className="dropdown-item" href="#" role="presentation">Third Product</span>
                                </div>
                            </div>
                            <div className="form-group">
                                <button className="btn btn-primary btn-block" type="submit">Add Admin</button>
                            </div>
                        </form>
                    </div>
            </div>
        );
    }
}
//  var myForm=$('#myForm');
    
//     myForm.onsubmit= async(e) => {
//         e.preventDefault();
//     }

export default AddAdmin;
